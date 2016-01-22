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
            array('id, ordem_servico_id, tipo_item_id, item_id, observacao, excluido', 'safe', 'on' => 'search'),
        );
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

    public function scopes() {
        return array(
            'naoExcluido' => array(
                'condition' => 't.excluido = false'
            ),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'ordem_servico_id' => 'Ordem Servico',
            'tipo_item_id' => 'Tipo do Item',
            'item_id' => 'Item',
            'observacao' => 'Observacao',
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

    public function removerItens() {
        if (!empty($this->ordem_servico_id)) {
            $oModels = self::model()->deleteAllByAttributes(array(
                'ordem_servico_id' => $this->ordem_servico_id,
            ));
        }
    }

    public function salvarItemPorTipo($tipoItem, $itemId, $aDados = null) {
        $model = new self;
        $model->ordem_servico_id = $this->ordem_servico_id;
        $model->tipo_item_id = $tipoItem;
        $model->item_id = $itemId;
        if ($model->save() && $itemId == self::ITEM_NAO_CADASTRADO && !empty($aDados)) {
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
            self::removerItens();
            $aItens = explode(',', $post['Produto']);
            if (!empty($aItens)) {
                foreach ($aItens as $item) {
                    if (!empty($item))
                        $this->salvarItemPorTipo(self::PRODUTO, $item);
                }
            }
            $aItens = explode(',', $post['Servico']);
            if (!empty($aItens)) {
                foreach ($aItens as $item) {
                    if (!empty($item))
                        $this->salvarItemPorTipo(self::SERVICO, $item);
                }
            }
        }
    }

    public function salvarItensNaoCadastrados($post) {
        if (!empty($post)) {
            foreach ($post as $tipoItem => $aDados) {
                if (!empty($aDados)) {
                    foreach ($aDados as $dados) {
                        $this->salvarItemPorTipo($tipoItem, self::ITEM_NAO_CADASTRADO, $dados);
                    }
                }
            }
        }
    }

}
