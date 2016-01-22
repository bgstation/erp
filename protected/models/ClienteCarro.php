<?php

/**
 * This is the model class for table "clientes_carros".
 *
 * The followings are the available columns in table 'clientes_carros':
 * @property integer $id
 * @property string $placa
 * @property integer $marca_id
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
        return array(
            array('observacao', 'safe'),
            array('placa, cliente_id', 'required'),
            array('marca_id, cliente_id, excluido, modelo_id', 'numerical', 'integerOnly' => true),
            array('placa', 'length', 'max' => 8),
            array('placa', 'checarUnique', 'except' => 'marcarExcluido'),
            array('id, placa, marca_id, cliente_id, observacao, excluido, modelo_id', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'marca' => array(self::BELONGS_TO, 'Marca', 'marca_id'),
            'modelo' => array(self::BELONGS_TO, 'Modelo', 'modelo_id'),
            'cor' => array(self::BELONGS_TO, 'Cor', 'cor_id'),
        );
    }

    public function scopes() {
        return array(
            'naoExcluido' => array(
                'condition' => 't.excluido = false'
            ),
            'ordenarPlaca' => array(
                'order' => 't.placa ASC'
            ),
        );
    }

    public function checarUnique() {
        $models = self::model()->naoExcluido()->findByAttributes(array(
            'placa' => $this->placa,
        ));
        if (!empty($models)) {
            $this->addError($this->placa, 'Esta placa já encontra-se cadastrada.');
            return false;
        }
        return true;
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'placa' => 'Placa',
            'marca_id' => 'Marca',
            'modelo_id' => 'Modelo',
            'cor_id' => 'Cor',
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
        $aJoin = array();

        $criteria->compare('id', $this->id);
        $criteria->compare('placa', $this->placa, true);
        $criteria->compare('observacao', $this->observacao, true);
        $criteria->compare('excluido', $this->excluido);
        
        if (!empty($this->marca_id)) {
            $aJoin[] = 'JOIN marcas marca ON marca.id = t.marca_id';
            $criteria->addCondition("marca.titulo like '%" . $this->marca_id . "%'");
        }
        if (!empty($this->modelo_id)) {
            $aJoin[] = 'JOIN modelos modelo ON modelo.id = t.modelo_id';
            $criteria->addCondition("modelo.titulo like '%" . $this->modelo_id . "%'");
        }
        if (!empty($this->cliente_id)) {
            $aJoin[] = 'JOIN clientes cliente ON cliente.id = t.cliente_id';
            $criteria->addCondition("cliente.nome like '%" . $this->cliente_id . "%'");
        }
        if (!empty($aJoin)) {
            $criteria->join = implode(' ', $aJoin);
        }

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
    
    public function marcarExcluido(){
        $this->scenario = 'marcarExcluido';
        $this->excluido = 1;
        if(!$this->save()){
            die(var_dump($this->getErrors()));
        }
    }

}
