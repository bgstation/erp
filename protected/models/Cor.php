<?php

/**
 * This is the model class for table "cores".
 *
 * The followings are the available columns in table 'cores':
 * @property integer $id
 * @property string $titulo
 * @property string $rgb
 * @property integer $excluido
 */
class Cor extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cores';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('excluido', 'numerical', 'integerOnly' => true),
            array('titulo, rgb', 'length', 'max' => 20),
            array('titulo', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, titulo, rgb, excluido', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
        );
    }

    public function scopes() {
        return array(
            'naoExcluido' => array(
                'condition' => 't.excluido = false'
            ),
            'ordenarTitulo' => array(
                'order' => 't.titulo ASC'
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'titulo' => 'Titulo',
            'rgb' => 'Rgb',
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
        $criteria->compare('rgb', $this->rgb, true);
        $criteria->compare('excluido', $this->excluido);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cor the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
