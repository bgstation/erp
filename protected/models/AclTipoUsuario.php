<?php

/**
 * This is the model class for table "acl_tipos_usuarios".
 *
 * The followings are the available columns in table 'acl_tipos_usuarios':
 * @property integer $id
 * @property string $titulo
 * @property integer $excluido
 * @property string $data_cadastro
 */
class AclTipoUsuario extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'acl_tipos_usuarios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('excluido', 'numerical', 'integerOnly' => true),
            array('titulo', 'length', 'max' => 20),
            array('data_cadastro', 'safe'),
            array('id, titulo, excluido, data_cadastro', 'safe', 'on' => 'search'),
        );
    }
    
    public function beforeSave() {
        if ($this->isNewRecord) {
            $this->data_cadastro = date('Y-m-d H:i:s');
        }
        return parent::beforeSave();
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
            'titulo' => 'Título',
            'excluido' => 'Desabilitado',
            'data_cadastro' => 'Data Cadastro',
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
        $criteria->compare('excluido', $this->excluido);
        $criteria->compare('data_cadastro', $this->data_cadastro, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AclTipoUsuario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
