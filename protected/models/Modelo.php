<?php

/**
 * This is the model class for table "modelos".
 *
 * The followings are the available columns in table 'modelos':
 * @property integer $id
 * @property string $titulo
 * @property integer $marca_id
 * @property string $observacao
 * @property integer $excluido
 */
class Modelo extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'modelos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('marca_id, excluido', 'numerical', 'integerOnly' => true),
            array('titulo', 'length', 'max' => 200),
            array('observacao', 'safe'),
            array('titulo, marca_id', 'required'),
            array('id, titulo, marca_id, observacao, excluido', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'marca' => array(self::BELONGS_TO, 'Marca', 'marca_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'titulo' => 'Título',
            'marca_id' => 'Marca',
            'observacao' => 'Observação',
            'excluido' => 'Excluído',
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
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('observacao', $this->observacao, true);
        $criteria->compare('excluido', $this->excluido);
        
        if (!empty($this->marca_id)) {
            $aJoin[] = 'JOIN marcas marca ON marca.id = t.marca_id';
            $criteria->addCondition("marca.titulo like '%" . $this->marca_id . "%'");
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
     * @return Modelo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
