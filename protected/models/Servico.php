<?php

/**
 * This is the model class for table "servicos".
 *
 * The followings are the available columns in table 'servicos':
 * @property integer $id
 * @property string $titulo
 * @property string $preco
 * @property string $observacao
 */
class Servico extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'servicos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('titulo', 'length', 'max' => 200),
            array('preco', 'length', 'max' => 10),
            array('observacao', 'safe'),
            array('preco', 'tratarPreco'),
            array('titulo', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, titulo, preco, observacao', 'safe', 'on' => 'search'),
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
            'id' => 'Código',
            'titulo' => 'Titulo',
            'preco' => 'Preço R$',
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
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('preco', $this->preco, true);
        $criteria->compare('observacao', $this->observacao, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Servico the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
