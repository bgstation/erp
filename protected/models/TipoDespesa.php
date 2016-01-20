<?php

/**
 * This is the model class for table "tipo_despesas".
 *
 * The followings are the available columns in table 'tipo_despesas':
 * @property integer $id
 * @property string $titulo
 * @property string $excluido
 */
class TipoDespesa extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'tipos_despesas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('titulo', 'length', 'max' => 200),
            array('titulo', 'required'),
            array('id, titulo, excluido', 'safe', 'on' => 'search'),
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
            'ordenarTitulo' => array(
                'order' => 't.titulo ASC',
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Código',
            'titulo' => 'Titulo',
            'excluido' => 'Excluído'
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
        $criteria->compare('excluido', $this->excluido, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TipoDespesa the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
