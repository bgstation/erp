<?php

/**
 * This is the model class for table "ordens_servico_tipos_pagamento".
 *
 * The followings are the available columns in table 'ordens_servico_tipos_pagamento':
 * @property integer $id
 * @property integer $ordem_servico_id
 * @property integer $forma_pagamento_id
 * @property integer $parcelas
 * @property string $valor
 */
class OrdemServicoTipoPagamento extends CActiveRecord {

    public $aFormasPagamento = array(
        1 => 'Dinheiro',
        2 => 'Débito',
        3 => 'Crédito',
    );
    
    const DINHEIRO = 1;
    const DEBITO = 2;
    const CREDITO = 3;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ordens_servico_tipos_pagamento';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('ordem_servico_id, forma_pagamento_id, parcelas', 'numerical', 'integerOnly' => true),
            array('valor', 'length', 'max' => 10),
            array('id, ordem_servico_id, forma_pagamento_id, parcelas, valor', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'ordem_servico_id' => 'Ordem de serviço',
            'forma_pagamento_id' => 'Forma de pagamento',
            'parcelas' => 'Parcelas',
            'valor' => 'Valor',
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
        $criteria->compare('forma_pagamento_id', $this->forma_pagamento_id);
        $criteria->compare('parcelas', $this->parcelas);
        $criteria->compare('valor', $this->valor, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OrdemServicoTipoPagamento the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
