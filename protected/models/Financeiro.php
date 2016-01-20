<?php

/**
 * This is the model class for table "financeiro".
 *
 * The followings are the available columns in table 'financeiro':
 * @property integer $id
 * @property integer $tipo_item
 * @property integer $tipo_item_id
 * @property string $descricao
 * @property string $valor
 * @property integer $parcelas
 * @property string $usuario
 * @property string $data_hora
 */
class Financeiro extends CActiveRecord {

    public $aTiposItens = array(
        1 => 'Ordem de serviço',
        2 => 'Compra',
        3 => 'Despesa',
    );

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'financeiro';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipo_item, tipo_item_id, parcelas', 'numerical', 'integerOnly' => true),
            array('descricao, usuario', 'length', 'max' => 200),
            array('valor', 'length', 'max' => 10),
            array('data_hora', 'safe'),
            array('id, tipo_item, tipo_item_id, descricao, valor, parcelas, usuario, data_hora', 'safe', 'on' => 'search'),
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
            'tipo_item' => 'Tipo',
            'tipo_item_id' => 'Identificador',
            'descricao' => 'Descrição',
            'valor' => 'Valor',
            'parcelas' => 'Parcelas',
            'usuario' => 'Usuário',
            'data_hora' => 'Data',
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
        $criteria->compare('tipo_item', $this->tipo_item);
        $criteria->compare('tipo_item_id', $this->tipo_item_id);
        $criteria->compare('descricao', $this->descricao, true);
        $criteria->compare('valor', $this->valor, true);
        $criteria->compare('parcelas', $this->parcelas);
        $criteria->compare('usuario', $this->usuario, true);
        $criteria->compare('data_hora', $this->data_hora, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Financeiro the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function salvar($tipoItem, $obj, $usuarioNome = null) {
        $this->tipo_item = $tipoItem;
        $this->tipo_item_id = $obj->id;
        switch ($tipoItem) {
            case 1:
                $this->descricao = $obj->cliente->nome . " - " . $obj->clienteCarro->placa;
                $this->usuario = $usuarioNome;
                $this->valor = $obj->getValorTotal() - $obj->desconto;
                break;
            case 2:
                $this->descricao = $obj->produto->titulo;
                break;
            case 3:
                $this->descricao = $obj->tipoDespesa->titulo;
                break;
            default:
                $this->usuario = $obj->usuario->nome;
                $this->valor = $obj->preco;
                break;
        }
        $this->data_hora = date("Y-m-d H:i:s");
        $this->save();
    }

    public function getLink($tipoItem, $tipoItemId) {
        switch ($tipoItem) {
            case 1:
                return CHtml::link($tipoItemId, Yii::app()->createUrl('ordemServico/view', array('id' => $tipoItemId)), array('target' => '_blank'));
                break;
            case 2:
                return CHtml::link($tipoItemId, Yii::app()->createUrl('compra/view', array('id' => $tipoItemId)), array('target' => '_blank'));
                break;
            case 3:
                return CHtml::link($tipoItemId, Yii::app()->createUrl('despesa/view', array('id' => $tipoItemId)), array('target' => '_blank'));
                break;
        }
    }

    public function getColor($tipoItem) {
        switch ($tipoItem) {
            case 1:
                return 'alert-success';
                break;
            case 2:
                return 'alert-info';
                break;
            case 3:
                return 'alert-danger';
                break;
        }
    }

}
