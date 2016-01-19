<?php

/**
 * This is the model class for table "compras".
 *
 * The followings are the available columns in table 'compras':
 * @property integer $id
 * @property string $nota_fiscal
 * @property integer $produto_id
 * @property string $preco
 * @property string $observacao
 * @property integer $quantidade
 * @property string $data_hora
 * @property integer $usuario_id
 * @property integer $excluido
 */
class Compra extends CActiveRecord {

    private $qntAntigaTmp = 0;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'compras';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('produto_id, quantidade, usuario_id, excluido', 'numerical', 'integerOnly' => true),
            array('nota_fiscal', 'length', 'max' => 200),
            array('preco', 'length', 'max' => 10),
            array('observacao, data_hora', 'safe'),
            array('produto_id', 'required'),
            array('preco', 'tratarPreco'),
            array('id, nota_fiscal, produto_id, preco, observacao, quantidade, data_hora, usuario_id, excluido', 'safe', 'on' => 'search'),
        );
    }

    public function tratarPreco() {
        if (!empty($this->preco)) {
            $preco = str_replace('.', '', $this->preco);
            $this->preco = str_replace(',', '.', $preco);
        }
    }

    public function beforeSave() {
        $this->usuario_id = Yii::app()->user->getId();
        if ($this->isNewRecord) {
            $this->data_hora = date('Y-m-d H:i:s');
        } else {
            $this->qntAntigaTmp = self::model()->findByPk($this->id)->quantidade;
        }
        return parent::beforeSave();
    }

    public function afterSave() {
        $oProduto = Produto::model()->findByPk($this->produto_id);
        $oProduto->scenario = 'alteracaoCompra';
        if ($this->isNewRecord) {
            $oProduto->quantidade = $oProduto->quantidade + $this->quantidade;
            $oProduto->save();
            $oFinanceiro = new Financeiro;
            $oFinanceiro->salvar(2, $this);
        } else {
            if ($this->qntAntigaTmp != $this->quantidade) {
                if ($this->qntAntigaTmp < $this->quantidade) {
                    $diffQuantidade = $this->quantidade - $this->qntAntigaTmp;
                    $oProduto->quantidade = $oProduto->quantidade + $diffQuantidade;
                } else {
                    $diffQuantidade = $this->qntAntigaTmp - $this->quantidade;
                    $oProduto->quantidade = $oProduto->quantidade - $diffQuantidade;
                }
                $oProduto->save();
            }
        }
        return parent::afterSave();
    }

    public function scopes() {
        return array(
            'naoExcluido' => array(
                'condition' => 't.excluido = false',
            ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'produto' => array(self::BELONGS_TO, 'Produto', 'produto_id'),
            'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Código',
            'nota_fiscal' => 'Nota fiscal',
            'produto_id' => 'Produto',
            'preco' => 'Preço',
            'observacao' => 'Observação',
            'quantidade' => 'Quantidade',
            'data_hora' => 'Data',
            'usuario_id' => 'Usuário',
            'excluido' => 'Excluído',
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
        $criteria->compare('nota_fiscal', $this->nota_fiscal, true);
        $criteria->compare('produto_id', $this->produto_id);
        $criteria->compare('preco', $this->preco, true);
        $criteria->compare('observacao', $this->observacao, true);
        $criteria->compare('quantidade', $this->quantidade);
        $criteria->compare('data_hora', $this->data_hora, true);
        $criteria->compare('usuario_id', $this->usuario_id);
        $criteria->compare('excluido', $this->excluido);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Compra the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
