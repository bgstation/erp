<?php

/**
 * This is the model class for table "acl_tipos_usuarios_rotas".
 *
 * The followings are the available columns in table 'acl_tipos_usuarios_rotas':
 * @property integer $id
 * @property integer $acl_rota_id
 * @property integer $acl_tipo_usuario_id
 * @property integer $excluido
 * @property string $data_insercao
 * @property string $data_ultima_atualizacao
 */
class AclTipoUsuarioRota extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'acl_tipos_usuarios_rotas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('acl_rota_id, acl_tipo_usuario_id, excluido', 'numerical', 'integerOnly' => true),
            array('data_insercao, data_ultima_atualizacao', 'safe'),
            array('id, acl_rota_id, acl_tipo_usuario_id, excluido, data_insercao, data_ultima_atualizacao', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'rota' => array(self::BELONGS_TO, 'AclRota', 'acl_rota_id'),
            'tipoUsuario' => array(self::BELONGS_TO, 'AclTipoUsuario', 'acl_tipo_usuario_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'acl_rota_id' => 'Acl Rota',
            'acl_tipo_usuario_id' => 'Acl Tipo Usuario',
            'excluido' => 'Excluido',
            'data_insercao' => 'Data Insercao',
            'data_ultima_atualizacao' => 'Data Ultima Atualizacao',
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
        $criteria->compare('acl_rota_id', $this->acl_rota_id);
        $criteria->compare('acl_tipo_usuario_id', $this->acl_tipo_usuario_id);
        $criteria->compare('excluido', $this->excluido);
        $criteria->compare('data_insercao', $this->data_insercao, true);
        $criteria->compare('data_ultima_atualizacao', $this->data_ultima_atualizacao, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function scopes() {
        return array(
            'naoExcluido' => array(
                'condition' => 't.excluido = false'
            ),
        );
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AclTipoUsuarioRota the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function retornaRotasPorTipoUsuario() {
        $aAclTipoUsuarioRotas = array();
        if (!empty($this->acl_tipo_usuario_id)) {
            $oModels = self::model()->naoExcluido()->findAllByAttributes(array(
                'acl_tipo_usuario_id' => $this->acl_tipo_usuario_id,
            ));
            foreach ($oModels as $model) {
                $aAclTipoUsuarioRotas[] = $model->acl_rota_id;
            }
        }
        return $aAclTipoUsuarioRotas;
    }

    public function marcarComoExcluido() {
        if (!empty($this->acl_tipo_usuario_id)) {
            $oModels = self::model()->naoExcluido()->findAllByAttributes(array(
                'acl_tipo_usuario_id' => $this->acl_tipo_usuario_id,
            ));
            if (!empty($oModels))
                foreach ($oModels as $model) {
                    $model->excluido = 1;
                    $model->save();
                }
        }
    }

    public function salvarTipoUsuarioRotas($post) {
        $this->marcarComoExcluido();
        if (!empty($post['AclTipoUsuarioRotas'])) {
            foreach ($post['AclTipoUsuarioRotas'] as $value) {
                $model = new self;
                $model->acl_tipo_usuario_id = $this->acl_tipo_usuario_id;
                $model->acl_rota_id = $value;
                $model->save();
            }
        }
    }

}
