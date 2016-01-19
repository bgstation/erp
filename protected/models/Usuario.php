<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $nome
 * @property string $login
 * @property string $senha
 * @property integer $acl_tipo_usuario_id
 * @property integer $excluido
 * @property string $data_cadastro
 */
class Usuario extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuarios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('acl_tipo_usuario_id, excluido', 'numerical', 'integerOnly' => true),
            array('nome, login', 'length', 'max' => 100),
            array('senha', 'length', 'max' => 60),
            array('senha, login, acl_tipo_usuario_id', 'required'),
            array('login', 'unique'),
            array('senha', 'tratarSenha'),
            array('data_cadastro', 'safe'),
            array('id, nome, login, senha, acl_tipo_usuario_id, excluido, data_cadastro', 'safe', 'on' => 'search'),
        );
    }

    public function tratarSenha() {
        if ($this->isNewRecord) {
            $this->senha = md5($this->senha);
        } else {
            $model = self::model()->findByPk($this->id);
            if ($model->senha != md5($this->senha)) {
                $this->senha = md5($this->senha);
            } else {
                $this->senha = $model->senha;
            }
        }
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
            'acl_tipo_usuario' => array(self::BELONGS_TO, 'AclTipoUsuario', 'acl_tipo_usuario_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'nome' => 'Nome',
            'login' => 'Login',
            'senha' => 'Senha',
            'acl_tipo_usuario_id' => 'Tipo Usuário',
            'excluido' => 'Desabilitado',
            'data_cadastro' => 'Data Cadastro',
        );
    }

    public function scopes() {
        return array(
            'naoExcluido' => array(
                'condition' => 'excluido = false',
            ),
            'ordenarNome' => array(
                'order' => 't.nome ASC',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('login', $this->login, true);
        $criteria->compare('senha', $this->senha, true);
        $criteria->compare('acl_tipo_usuario_id', $this->acl_tipo_usuario_id);
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
     * @return Usuario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function carregarPermissoes() {
        $oAclTipoUsuarioRota = AclTipoUsuarioRota::model()->naoExcluido()->findAllByAttributes(array(
            'acl_tipo_usuario_id' => $this->acl_tipo_usuario_id,
        ));
        $_aPermissoes = array();
        if (!empty($oAclTipoUsuarioRota)) {
            if (!empty($_SESSION[base64_encode(Yii::app()->params['projeto'] . '_PermissoesAcesso')][base64_encode('PermissoesAcessoUsuario')])) {
                unset($_SESSION[base64_encode(Yii::app()->params['projeto'] . '_PermissoesAcesso')][base64_encode('PermissoesAcessoUsuario')]);
            }
            foreach ($oAclTipoUsuarioRota as $aclTipoUsuarioRota) {
                $_aPermissoes[base64_encode(Yii::app()->params['projeto'] . '_PermissoesAcesso')][base64_encode('PermissoesAcessoUsuario')][base64_encode($aclTipoUsuarioRota->rota->controller)][base64_encode('actions')][] = base64_encode($aclTipoUsuarioRota->rota->action);
            }
            Yii::app()->user->setState('__' . base64_encode(Yii::app()->params['projeto'] . '_PermissoesAcessoUsuario'), $_aPermissoes);
        }
    }

}
