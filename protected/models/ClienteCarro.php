<?php

/**
 * This is the model class for table "clientes_carros".
 *
 * The followings are the available columns in table 'clientes_carros':
 * @property integer $id
 * @property string $placa
 * @property integer $marca_carro_id
 * @property integer $cliente_id
 * @property string $observacao
 * @property integer $excluido
 */
class ClienteCarro extends CActiveRecord {
    
    public $aMarcaCarro = array(
        'Agrale',
        'Aston Martin',
        'Audi',
        'Bentley',
        'BMW',
        'Changan',
        'Chery',
        'GM/Chevrolet',
        'Chrysler',
        'Citroën',
        'Dodge',
        'Effa',
        'Ferrari',
        'Fiat',
        'Ford',
        'Geely',
        'Hafei',
        'Honda',
        'Hyundai',
        'Iveco',
        'Jac Motors',
        'Jaguar',
        'Jeep',
        'Jinbei',
        'Jinbei',
        'Lamborghini',
        'Land Rover',
        'Lexus',
        'Lifan',
        'Mahindra',
        'Maserati',
        'Mercedes-Benz',
        'MG Motors',
        'Mini',
        'Mitsubishi',
        'Nissan',
        'Peugeot',
        'Porsche',
        'Ram',
        'Renault',
        'Smart',
        'Ssangyong',
        'Subaru',
        'Suzuki',
        'Toyota',
        'Troller',
        'Volkswagen',
        'Volvo',
    );

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'clientes_carros';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('observacao', 'safe'),
            array('placa, cliente_id', 'required'),
            array('marca_carro_id, cliente_id, excluido', 'numerical', 'integerOnly' => true),
            array('placa', 'length', 'max' => 8),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, placa, marca_carro_id, cliente_id, observacao, excluido', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'placa' => 'Placa',
            'marca_carro_id' => 'Marca',
            'cliente_id' => 'Cliente',
            'observacao' => 'Observação',
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
        $criteria->compare('placa', $this->placa, true);
        $criteria->compare('marca_carro_id', $this->marca_carro_id);
        $criteria->compare('cliente_id', $this->cliente_id);
        $criteria->compare('observacao', $this->observacao, true);
        $criteria->compare('excluido', $this->excluido);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ClienteCarro the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
