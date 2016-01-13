<?php

/**
 * This is the model class for table "despesas".
 *
 * The followings are the available columns in table 'despesas':
 * @property integer $id
 * @property integer $tipo_despesas_id
 * @property string $preco
 * @property string $observacao
 * @property integer $quantidade
 * @property string $data_hora
 * @property integer $usuario_id
 * @property integer $excluido
 */
class Despesa extends CActiveRecord {

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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipo_despesas_id, quantidade, usuario_id, excluido', 'numerical', 'integerOnly' => true),
            array('preco', 'length', 'max' => 10),
            array('observacao, data_hora', 'safe'),
            array('preco, tipo_despesas_id, quantidade', 'required'),
            array('preco', 'tratarPreco'),
            array('id, tipo_despesas_id, preco, observacao, quantidade, data_hora, usuario_id, excluido', 'safe', 'on' => 'search'),
        );
    }
    
    public function tratarPreco() {
        if (!empty($this->preco)) {
            $preco = str_replace('.', '', $this->preco);
            $this->preco = str_replace(',', '.', $preco);
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'tipoDespesa' => array(self::BELONGS_TO, 'TipoDespesa', 'tipo_despesa_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Código',
            'tipo_despesas_id' => 'Tipo de despesa',
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
        $criteria->compare('tipo_despesas_id', $this->tipo_despesas_id);
        $criteria->compare('preco', $this->preco, true);
        $criteria->compare('observacao', $this->observacao, true);
        $criteria->compare('quantidade', $this->quantidade);
        $criteria->compare('data_hora', $this->data_hora, true);
        $criteria->compare('usuario_id', $this->usuario_id);
        $criteria->compare('excluido', $this->excluido);

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

}
