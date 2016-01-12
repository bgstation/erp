<?php

/**
 * This is the model class for table "log_itens_nao_cadastrados".
 *
 * The followings are the available columns in table 'log_itens_nao_cadastrados':
 * @property integer $id
 * @property integer $ordem_servico_item_id
 * @property string $titulo
 * @property string $preco
 */
class LogItemNaoCadastrado extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'log_itens_nao_cadastrados';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ordem_servico_item_id', 'numerical', 'integerOnly' => true),
            array('titulo', 'length', 'max' => 200),
            array('preco', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, ordem_servico_item_id, titulo, preco', 'safe', 'on' => 'search'),
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
            'ordem_servico_item_id' => 'Ordem Servico Item',
            'titulo' => 'Titulo',
            'preco' => 'Preco',
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
        $criteria->compare('ordem_servico_item_id', $this->ordem_servico_item_id);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('preco', $this->preco, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LogItemNaoCadastrado the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
