<?php

/**
 * This is the model class for table "ordens_servico_itens".
 *
 * The followings are the available columns in table 'ordens_servico_itens':
 * @property integer $id
 * @property integer $ordem_servico_id
 * @property integer $tipo_item_id
 * @property integer $item_id
 * @property string $observacao
 * @property integer $excluido
 */

class OrdemServicoItem extends CActiveRecord {

    public $aTipoItem = array(
        1 => 'Produto',
        2 => 'Serviço',
    );

    const ITEM_NAO_CADASTRADO = 0;
    const PRODUTO = 1;
    const SERVICO = 2;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ordens_servico_itens';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('ordem_servico_id, tipo_item_id, item_id, excluido', 'numerical', 'integerOnly' => true),
            array('observacao', 'safe'),
            array('preco', 'tratarPreco', 'except' => 'alteracao'),
            array('id, ordem_servico_id, tipo_item_id, item_id, observacao, excluido', 'safe', 'on' => 'search'),
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
            'produto' => array(self::BELONGS_TO, 'Produto', 'item_id'),
            'servico' => array(self::BELONGS_TO, 'Servico', 'item_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'ordem_servico_id' => 'Nº Ordem Serviço',
            'tipo_item_id' => 'Tipo do Item',
            'item_id' => 'Item',
            'observacao' => 'Observação',
            'excluido' => 'Excluído',
            'preco' => 'Preço',
        );
    }
    
    public function scopes() {
        return array(
            'naoExcluido' => array(
                'condition' => 't.excluido = false'
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
        $criteria->compare('ordem_servico_id', $this->ordem_servico_id);
        $criteria->compare('tipo_item_id', $this->tipo_item_id);
        $criteria->compare('item_id', $this->item_id);
        $criteria->compare('observacao', $this->observacao, true);
        $criteria->compare('excluido', $this->excluido);


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OrdemServicoItem the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function removerItens($cadastrados = true) {
        if (!empty($this->ordem_servico_id)) {
            if ($cadastrados) {
                $oModels = self::model()->deleteAll(array(
                    'condition' => 'ordem_servico_id =' . $this->ordem_servico_id . ' AND item_id != 0',
                ));
            } else {
                $oModels = self::model()->findAll(array(
                    'condition' => 'ordem_servico_id =' . $this->ordem_servico_id . ' AND item_id = 0',
                ));
                foreach ($oModels as $model) {
                    $oLogItensNaoCadastrado = LogItemNaoCadastrado::model()->deleteAllByAttributes(array(
                        'ordem_servico_item_id' => $model->id,
                        'cadastrado' => false,
                    ));
                    $model->delete();
                }
            }
        }
    }

    public function salvarItemPorTipo($tipoItem, $aDados) {
        $model = new self;
        $model->ordem_servico_id = $this->ordem_servico_id;
        $model->tipo_item_id = $tipoItem;
        $model->item_id = $aDados['id'];
        $model->preco = !empty($aDados['preco']) ? $aDados['preco'] : null;
        if ($model->save() && $aDados['id'] == self::ITEM_NAO_CADASTRADO && !empty($aDados)) {
            $oLogItemNaoCadastrado = new LogItemNaoCadastrado;
            $oLogItemNaoCadastrado->ordem_servico_item_id = $model->id;
            $oLogItemNaoCadastrado->titulo = $aDados['titulo'];
            $oLogItemNaoCadastrado->preco = $aDados['preco'];
            $oLogItemNaoCadastrado->usuario_id = Yii::app()->user->getId();
            $oLogItemNaoCadastrado->save();
        }
    }

    public function salvarItens($post) {
        if (!empty($post)) {
            self::removerItens(true);
            if (!empty($post['Item'])) {
                foreach ($post['Item'] as $tipoItem => $aItens) {
                    foreach ($aItens as $aItem) {
                        $this->salvarItemPorTipo($tipoItem, $aItem);
                    }
                }
            }
        }
    }

    public function salvarItensNaoCadastrados($post) {
        if (!empty($post)) {
            self::removerItens(false);
            foreach ($post['Item'] as $tipoItem => $aDados) {
                if (!empty($aDados)) {
                    foreach ($aDados as $dados) {
                        $this->salvarItemPorTipo($tipoItem, $dados);
                    }
                }
            }
        }
    }
    
    public function getTituloItem() {
        return $this->tipo_item_id == OrdemServicoItem::PRODUTO ? $this->produto->titulo : $this->servico->titulo;
    }

}
