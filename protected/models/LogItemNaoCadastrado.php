<?php

/**
 * This is the model class for table "log_itens_nao_cadastrados".
 *
 * The followings are the available columns in table 'log_itens_nao_cadastrados':
 * @property integer $id
 * @property integer $ordem_servico_item_id
 * @property string $titulo
 * @property string $preco
 * @property string $cadastrado
 * @property integer $usuario_id
 */
class LogItemNaoCadastrado extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'log_itens_nao_cadastrados';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('ordem_servico_item_id', 'numerical', 'integerOnly' => true),
            array('titulo', 'length', 'max' => 200),
            array('preco', 'length', 'max' => 10),
            array('preco', 'tratarPreco', 'except' => 'alteracao'),
            array('id, ordem_servico_item_id, titulo, preco, cadastrado, usuario_id', 'safe', 'on' => 'search'),
        );
    }
    
    public function tratarPreco() {
        if (!empty($this->preco)) {
            $preco = str_replace('.', '', $this->preco);
            $this->preco = str_replace(',', '.', $preco);
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
            'ordemServicoItem' => array(self::BELONGS_TO, 'OrdemServicoItem', 'ordem_servico_item_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'ordem_servico_item_id' => 'Ordem Serviço Item',
            'titulo' => 'Título',
            'preco' => 'Preço',
            'cadastrado' => 'Cadastrado',
            'usuario_id' => 'Usuário Responsável',
        );
    }
    
    public function scopes() {
        return array(
            'naoCadastrado' => array(
                'condition' => 'cadastrado = false'
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
        $criteria->compare('ordem_servico_item_id', $this->ordem_servico_item_id);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('preco', $this->preco, true);
        $criteria->compare('cadastrado', $this->cadastrado, true);
        $criteria->compare('usuario_id', $this->usuario_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return LogItemNaoCadastrado the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
