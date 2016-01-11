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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ordem_servico_id, status, usuario_id', 'numerical', 'integerOnly' => true),
            array('ip', 'length', 'max' => 20),
            array('data_hora', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, ordem_servico_id, status, data_hora, ip, usuario_id', 'safe', 'on' => 'search'),
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
            'ordem_servico_id' => 'Ordem Servico',
            'status' => 'Status',
            'data_hora' => 'Data Hora',
            'ip' => 'Ip',
            'usuario_id' => 'Usuario',
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
    
    public function salvarLog(){
        $this->data_hora = date('Y-m-d H:i:s');
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->usuario_id = Yii::app()->user->getId();
        $this->save();
    }

}
