<?php

/**
 * This is the model class for table "despesas".
 *
 * The followings are the available columns in table 'despesas':
 * @property integer $id
 * @property integer $tipo_despesa_id
 * @property string $preco
 * @property string $observacao
 * @property integer $quantidade
 * @property string $data_hora
 * @property integer $usuario_id
 * @property integer $excluido
 */
class Despesa extends CActiveRecord {

    public $data_hora_inicial;
    public $data_hora_final;
    public $data_hora_inicial_grid;
    public $data_hora_final_grid;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'despesas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('tipo_despesa_id, quantidade, usuario_id, excluido', 'numerical', 'integerOnly' => true),
            array('preco', 'length', 'max' => 10),
            array('observacao, data_hora, data_hora_inicial, data_hora_final, data_hora_inicial_grid, data_hora_final_grid', 'safe'),
            array('preco, tipo_despesa_id, quantidade', 'required'),
            array('preco', 'tratarPreco', 'except' => 'cancelarCompra'),
            array('id, tipo_despesa_id, preco, observacao, quantidade, data_hora, usuario_id, excluido', 'safe', 'on' => 'search'),
        );
    }

    public function tratarPreco() {
        if (!empty($this->preco)) {
            $preco = str_replace('.', '', $this->preco);
            $this->preco = str_replace(',', '.', $preco);
        }
    }

    public function beforeSave() {
        $this->usuario_id = Yii::app()->user->getId();
        if ($this->isNewRecord) {
            $this->data_hora = date('Y-m-d H:i:s');
        }
        return parent::beforeSave();
    }

    public function afterSave() {
        if ($this->isNewRecord) {
            $oFinanceiro = new Financeiro;
            $oFinanceiro->salvar(3, $this);
        } else if ($this->excluido == 1) {
            $oFinanceiro = Financeiro::model()->findByAttributes(array(
                'tipo_item' => 3,
                'tipo_item_id' => $this->id,
            ));
            $oFinanceiro->salvar(3, $this, null, 1);
        }
        parent::afterSave();
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'tipoDespesa' => array(self::BELONGS_TO, 'TipoDespesa', 'tipo_despesa_id'),
            'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Código',
            'tipo_despesa_id' => 'Tipo de despesa',
            'preco' => 'Preço',
            'observacao' => 'Observação',
            'quantidade' => 'Quantidade',
            'data_hora' => 'Data',
            'usuario_id' => 'Usuário',
            'excluido' => 'Excluído',
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
        $criteria->compare('tipo_despesa_id', $this->tipo_despesa_id);
        $criteria->compare('preco', $this->preco, true);
        $criteria->compare('observacao', $this->observacao, true);
        $criteria->compare('quantidade', $this->quantidade);
        $criteria->compare('data_hora', $this->data_hora, true);
        $criteria->compare('usuario_id', $this->usuario_id);
        $criteria->compare('excluido', $this->excluido);

        if (!empty($this->data_hora_inicial) && !empty($this->data_hora_final)) {
            $this->data_hora_inicial_grid = $this->data_hora_inicial;
            $this->data_hora_final_grid = $this->data_hora_final;
            $criteria->addBetweenCondition('date(data_hora)', $this->data_hora_inicial, $this->data_hora_final);
        } else if (!empty($this->data_hora_inicial_grid) && !empty($this->data_hora_final_grid)) {
            $this->data_hora_inicial = $this->data_hora_inicial_grid;
            $this->data_hora_final = $this->data_hora_final_grid;
            $criteria->addBetweenCondition('date(data_hora)', $this->data_hora_inicial, $this->data_hora_final);
        }

        if (!empty($this->tipo_despesa_id)) {
            $criteria->join = ' JOIN tipos_despesas td ON td.id = t.tipo_despesa_id ';
            $criteria->addCondition("td.titulo like '" . $this->tipo_despesa_id . "'");
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Despesa the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function checaCancelado() {
        if ($this->excluido == 1) {
            return false;
        } else {
            return true;
        }
    }

}
