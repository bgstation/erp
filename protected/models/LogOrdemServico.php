<?php

/**
 * This is the model class for table "log_ordens_servico".
 *
 * The followings are the available columns in table 'log_ordens_servico':
 * @property integer $id
 * @property integer $ordem_servico_id
 * @property integer $status
 * @property string $data_hora
 * @property string $ip
 * @property integer $usuario_id
 */
class LogOrdemServico extends CActiveRecord {

    public $aStatus = array(
        1 => 'Aberta',
        2 => 'Fechada',
        3 => 'Cancelada',
    );

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'log_ordens_servico';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('ordem_servico_id, status, usuario_id', 'numerical', 'integerOnly' => true),
            array('ip', 'length', 'max' => 20),
            array('data_hora, observacao', 'safe'),
            array('id, ordem_servico_id, status, data_hora, ip, usuario_id, observacao', 'safe', 'on' => 'search'),
        );
    }

    public function afterSave() {
        if ($this->status == 2 && $this->isNewRecord) {
            $oFinanceiro = new Financeiro;
            $oFinanceiro->salvar(1, $this->ordemServico, $this->usuario->nome);
            foreach ($this->ordemServico->ordemServicoItens as $item) {
                if ($item->tipo_item_id == 1) {
                    $oLogRetiradaProduto = new LogRetiradaProduto;
                    $oLogRetiradaProduto->produto_id = $item->item_id;
                    $oLogRetiradaProduto->quantidade = 1;
                    $oLogRetiradaProduto->observacao = 'Ordem de Serviço: ' . $this->ordem_servico_id;
                    $oLogRetiradaProduto->data_hora = date("Y-m-d H:i:s");
                    $oLogRetiradaProduto->usuario_id = Yii::app()->user->getId();
                    $oLogRetiradaProduto->ordem_servico_id = $this->ordem_servico_id;
                    if (!$oLogRetiradaProduto->save()) {
                        die(var_dump($oLogRetiradaProduto->getErrors()));
                    }
                    $oProduto = Produto::model()->findByPk($item->item_id);
                    $oProduto->decrementarQuantidade();
                }
            }
        } else if ($this->status == 3) {
            $oFinanceiro = Financeiro::model()->findByAttributes(array(
                'tipo_item' => 1,
                'tipo_item_id' => $this->ordem_servico_id,
            ));
//            echo '<pre>';
//            die($oFinanceiro);
            $oFinanceiro->salvar(1, $this->ordemServico, $this->usuario->nome, 1);
            foreach ($this->ordemServico->ordemServicoItens as $item) {
                if ($item->tipo_item_id == 1) {
                    $oLogRetiradaProduto = LogRetiradaProduto::model()->findByAttributes(array(
                        'ordem_servico_id' => $this->ordem_servico_id,
                        'produto_id' => $item->item_id,
                    ));
                    $oLogRetiradaProduto->excluido = 1;
                    if (!$oLogRetiradaProduto->save()) {
                        die(var_dump($oLogRetiradaProduto->getErrors()));
                    }
                    $oProduto = Produto::model()->findByPk($item->item_id);
                    $oProduto->incrementarQuantidade();
                }
            }
        }
        parent::afterSave();
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'ordemServico' => array(self::BELONGS_TO, 'OrdemServico', 'ordem_servico_id'),
            'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
        );
    }

    public function scopes() {
        return array(
            'aberta' => array(
                'condition' => 't.status = 1',
            ),
            'finalizada' => array(
                'condition' => 't.status = 2',
            ),
            'ultimoRegistro' => array(
                'order' => 'data_hora DESC',
                'limit' => '1'
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'ordem_servico_id' => 'Ordem de servico',
            'status' => 'Status',
            'data_hora' => 'Data',
            'ip' => 'Ip',
            'usuario_id' => 'Usuário',
            'observacao' => 'Observação',
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
        $criteria->compare('ordem_servico_id', $this->ordem_servico_id);
        $criteria->compare('status', $this->status);
        $criteria->compare('data_hora', $this->data_hora, true);
        $criteria->compare('ip', $this->ip, true);
        $criteria->compare('usuario_id', $this->usuario_id);
        $criteria->compare('observacao', $this->observacao);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LogOrdemServico the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function salvarLog() {
        $this->data_hora = date('Y-m-d H:i:s');
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->usuario_id = Yii::app()->user->getId();
        if ($this->save()) {
            return true;
        }
        return false;
    }

}
