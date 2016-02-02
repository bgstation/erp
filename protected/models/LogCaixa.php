<?php

/**
 * This is the model class for table "logs_caixa".
 *
 * The followings are the available columns in table 'logs_caixa':
 * @property integer $id
 * @property integer $operacao_id
 * @property string $descricao
 * @property string $valor
 * @property string $usuario_id
 * @property string $data_hora
 */
class LogCaixa extends CActiveRecord {

    public $aOperacoes = array(
        1 => 'Retirada',
        2 => 'Novo',
    );

    CONST RETIRADA = 1;
    CONST INICIO = 2;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'logs_caixa';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('operacao_id, usuario_id', 'numerical', 'integerOnly' => true),
            array('descricao', 'length', 'max' => 200),
            array('valor', 'length', 'max' => 10),
            array('valor, operacao_id', 'required'),
            array('valor', 'tratarValor'),
            array('data_hora', 'safe'),
            array('id, operacao_id, usuario_id, descricao, valor, data_hora', 'safe', 'on' => 'search'),
        );
    }

    public function tratarValor() {
        if (!empty($this->valor)) {
            $valor = str_replace('.', '', $this->valor);
            $this->valor = str_replace(',', '.', $valor);
        }
    }

    public function beforeSave() {
        if ($this->operacao_id == self::RETIRADA) {
            $aRetorno = $this->getValores();
            $oFinanceiro = new Financeiro('search');
            $total = ($aRetorno['inicio'] - $aRetorno['retiradas']) + $oFinanceiro->getTotalOrdemServicoDinheiro($aRetorno['data_inicio']);
            if ($this->valor > $total) {
                $this->addError('valor', 'O valor disponível para retirada é de R$ '. RPFormat::valorMonetario($total));
                return false;
            }
        }
        $this->usuario_id = Yii::app()->user->getId();
        $this->data_hora = date("Y-m-d H:i:s");
        return parent::beforeSave();
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
        );
    }

    public function scopes() {
        return array(
            'ultimoInicio' => array(
                'condition' => 't.operacao_id = ' . self::INICIO,
                'order' => 'id DESC',
                'limit' => 1,
            ),
            'valorRetirada' => array(
                'condition' => 't.operacao_id = ' . self::RETIRADA,
                'order' => 'id DESC',
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'operacao_id' => 'Operação',
            'descricao' => 'Descrição',
            'valor' => 'Valor',
            'usuario_id' => 'Usuário',
            'data_hora' => 'Data',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('operacao_id', $this->operacao_id);
        $criteria->compare('descricao', $this->descricao, true);
        $criteria->compare('valor', $this->valor, true);
        $criteria->compare('usuario_id', $this->usuario_id, true);
        $criteria->compare('data_hora', $this->data_hora, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LogCaixa the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getValorInicio() {
        return self::model()->ultimoInicio()->find()->valor;
    }

    public function getValores() {
        $aRetorno = array();
        $aRetorno['inicio'] = 0;
        $aRetorno['retiradas'] = 0;
        $oLogCaixaInicio = self::model()->ultimoInicio()->find();
        $oLogCaixaRetirada = self::model()->valorRetirada()->findAll(array(
            'condition' => 'id > ' . $oLogCaixaInicio->id,
        ));
        $aRetorno['inicio'] = $oLogCaixaInicio->valor;
        $aRetorno['data_inicio'] = $oLogCaixaInicio->data_hora;
        if (!empty($oLogCaixaRetirada))
            foreach ($oLogCaixaRetirada as $logCaixa) {
                $aRetorno['retiradas'] = $aRetorno['retiradas'] + $logCaixa->valor;
            }
        return $aRetorno;
    }

}
