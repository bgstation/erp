<?php

/**
 * This is the model class for table "acl_rotas".
 *
 * The followings are the available columns in table 'acl_rotas':
 * @property integer $id
 * @property string $controller
 * @property string $action
 * @property string $titulo
 * @property string $descricao
 * @property integer $excluido
 */
class AclRota extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'acl_rotas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('excluido', 'numerical', 'integerOnly' => true),
            array('controller, action', 'length', 'max' => 50),
            array('titulo', 'length', 'max' => 20),
            array('descricao', 'safe'),
            array('id, controller, action, titulo, descricao, excluido', 'safe', 'on' => 'search'),
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
            'exibir' => array(
                'condition' => 't.exibir = true'
            ),
            'naoExibir' => array(
                'condition' => 't.exibir = false'
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'controller' => 'Controller',
            'action' => 'Action',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
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
        $criteria->compare('controller', $this->controller, true);
        $criteria->compare('action', $this->action, true);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('descricao', $this->descricao, true);
        $criteria->compare('excluido', $this->excluido);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AclRota the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getAclRotasArray() {
        $aAclRotas = array();
        $oAclRotas = self::model()->naoExcluido()->exibir()->findAll();
        $i = 0;
        if (!empty($oAclRotas))
            foreach ($oAclRotas as $oAclRotas) {
                $aAclRotas[$oAclRotas->categoria][$i]['titulo'] = $oAclRotas->titulo;
                $aAclRotas[$oAclRotas->categoria][$i]['id'] = $oAclRotas->id;
                $i++;
            }
        return $aAclRotas;
    }

}
