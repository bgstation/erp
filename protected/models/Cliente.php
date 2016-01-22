<?php

/**
 * This is the model class for table "clientes".
 *
 * The followings are the available columns in table 'clientes':
 * @property integer $id
 * @property string $email
 * @property string $nome
 * @property string $cpf
 * @property string $sexo
 * @property string $telefone_fixo
 * @property string $celular
 * @property string $endereco
 * @property integer $numero
 * @property string $complemento
 * @property string $data_cadastro
 */
class Cliente extends CActiveRecord {

    public $aSexo = array(
        'f' => 'Feminino',
        'm' => 'Masculino',
    );

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'clientes';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('numero', 'numerical', 'integerOnly' => true),
            array('email, nome, endereco', 'length', 'max' => 100),
            array('data_cadastro', 'safe'),
            array('cpf', 'length', 'max' => 14),
            array('sexo', 'length', 'max' => 1),
            array('telefone_fixo, celular, complemento', 'length', 'max' => 20),
            array('nome, cpf, email, sexo', 'required'),
            array('cpf, email', 'unique'),
            array('id, email, nome, cpf, sexo, telefone_fixo, celular, endereco, numero, complemento, data_cadastro', 'safe', 'on' => 'search'),
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
            'clientesCarros' => array(self::HAS_MANY, 'ClienteCarro', 'cliente_id'),
        );
    }
    
    public function scopes() {
        return array(
            'ordemNome' => array(
                'order' => 'nome ASC',
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Código',
            'email' => 'Email',
            'nome' => 'Nome',
            'cpf' => 'CPF',
            'sexo' => 'Sexo',
            'telefone_fixo' => 'Telefone Fixo',
            'celular' => 'Celular',
            'endereco' => 'Endereço',
            'numero' => 'Numero',
            'complemento' => 'Complemento',
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
        $criteria->compare('email', $this->email, true);
        $criteria->compare('nome', $this->nome, true);
        $criteria->compare('cpf', $this->cpf, true);
        $criteria->compare('sexo', $this->sexo, true);
        $criteria->compare('telefone_fixo', $this->telefone_fixo, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('endereco', $this->endereco, true);
        $criteria->compare('numero', $this->numero);
        $criteria->compare('complemento', $this->complemento, true);
        $criteria->compare('data_cadastro', $this->data_cadastro, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cliente the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getHeadersRelatorio() {
        $headers = array(
            'id',
            'nome',
            'email',
            'cpf',
            'sexo',
            'telefone_fixo',
            'celular',
            'endereco',
            'numero',
            'complemento',
            'data_cadastro',
        );
        return $headers;
    }

}
