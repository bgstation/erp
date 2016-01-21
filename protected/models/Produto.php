<?php

/**
 * This is the model class for table "produtos".
 *
 * The followings are the available columns in table 'produtos':
 * @property integer $id
 * @property string $titulo
 * @property string $codigo_barra
 * @property integer $marca_id
 * @property integer $modelo_id
 * @property string $preco
 * @property string $observacao
 * @property integer $quantidade
 * @property integer $excluido
 */
class Produto extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'produtos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('marca_id, modelo_id, quantidade, excluido, tipo_produto_id', 'numerical', 'integerOnly' => true),
            array('titulo', 'length', 'max' => 200),
            array('codigo_barra', 'length', 'max' => 300),
            array('preco', 'length', 'max' => 10),
            array('observacao', 'safe'),
            array('titulo', 'required'),
            array('preco', 'tratarPreco', 'except' => 'alteracaoCompra'),
            array('id, titulo, codigo_barra, marca_id, modelo_id, preco, observacao, quantidade, excluido, tipo_produto_id', 'safe', 'on' => 'search'),
        );
    }

    public function tratarPreco() {
        if (!empty($this->preco)) {
            $preco = str_replace('.', '', $this->preco);
            $this->preco = str_replace(',', '.', $preco);
        }
    }

    public function scopes() {
        return array(
            'naoExcluido' => array(
                'condition' => 't.excluido = false',
            ),
            'ordenarTitulo' => array(
                'order' => 't.titulo ASC',
            ),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'marca' => array(self::BELONGS_TO, 'Marca', 'marca_id'),
            'modelo' => array(self::BELONGS_TO, 'Modelo', 'modelo_id'),
            'tipoProduto' => array(self::BELONGS_TO, 'TipoProduto', 'tipo_produto_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'Código',
            'titulo' => 'Título',
            'codigo_barra' => 'Código de barra',
            'marca_id' => 'Marca',
            'modelo_id' => 'Modelo',
            'preco' => 'Preço',
            'observacao' => 'Observação',
            'quantidade' => 'Quantidade',
            'excluido' => 'Excluído',
            'tipo_produto_id' => 'Tipo do produto',
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
        $criteria->compare('codigo_barra', $this->codigo_barra, true);
        $criteria->compare('marca_id', $this->marca_id);
        $criteria->compare('modelo_id', $this->modelo_id);
        $criteria->compare('preco', $this->preco, true);
        $criteria->compare('observacao', $this->observacao, true);
        $criteria->compare('quantidade', $this->quantidade);
        $criteria->compare('excluido', $this->excluido);
        $criteria->compare('tipo_produto_id', $this->tipo_produto_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Produto the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getDataJson() {
        $aModels = array();
        $oModels = self::model()->naoExcluido()->ordenarTitulo()->findAll();
        if (!empty($oModels)) {
            $i = 0;
            foreach ($oModels as $model) {
                $aModels[$i]['id'] = $model->id;
                $aModels[$i]['text'] = $model->titulo;
                $aModels[$i]['preco'] = $model->preco;
                $aModels[$i]['tipoItem'] = 1;
                $i++;
            }
            $aModels[$i]['id'] = 0;
            $aModels[$i]['text'] = "Não cadastrado";
            $aModels[$i]['preco'] = 0.00;
            $aModels[$i]['tipoItem'] = 1;
        }
        return $aModels;
    }

    public function decrementarQuantidade($quantidade = null) {
        $this->scenario = 'alteracaoCompra';
        if (!empty($quantidade)) {
            $this->quantidade = $this->quantidade - $quantidade;
        } else {
            $this->quantidade = $this->quantidade - 1;
        }
        if(!$this->save()){
            die(var_dump($this->getErrors()));
        }
    }

}
