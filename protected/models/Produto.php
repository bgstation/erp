<?php

/**
 * This is the model class for table "produtos".
 *
 * The followings are the available columns in table 'produtos':
 * @property integer $id
 * @property string $titulo
 * @property string $codigo_barra
 * @property integer $marca_id
 * @property integer $modelo_id
 * @property string $preco
 * @property string $observacao
 * @property integer $quantidade
 * @property integer $excluido
 */
class Produto extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'produtos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('marca_id, modelo_id, quantidade, excluido', 'numerical', 'integerOnly' => true),
            array('titulo', 'length', 'max' => 200),
            array('codigo_barra', 'length', 'max' => 300),
            array('preco', 'length', 'max' => 10),
            array('observacao', 'safe'),
            array('titulo', 'required'),
            array('preco', 'tratarPreco'),
            array('id, titulo, codigo_barra, marca_id, modelo_id, preco, observacao, quantidade, excluido', 'safe', 'on' => 'search'),
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
            'marca' => array(self::BELONGS_TO, 'Marca', 'marca_id'),
            'modelo' => array(self::BELONGS_TO, 'Modelo', 'modelo_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Código',
            'titulo' => 'Titulo',
            'codigo_barra' => 'Codigo Barra',
            'marca_id' => 'Marca',
            'modelo_id' => 'Modelo',
            'preco' => 'Preco',
            'observacao' => 'Observacao',
            'quantidade' => 'Quantidade',
            'excluido' => 'Excluido',
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
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('codigo_barra', $this->codigo_barra, true);
        $criteria->compare('marca_id', $this->marca_id);
        $criteria->compare('modelo_id', $this->modelo_id);
        $criteria->compare('preco', $this->preco, true);
        $criteria->compare('observacao', $this->observacao, true);
        $criteria->compare('quantidade', $this->quantidade);
        $criteria->compare('excluido', $this->excluido);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Produto the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
