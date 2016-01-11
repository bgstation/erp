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
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('ordem_servico_id, tipo_item_id, item_id, excluido', 'numerical', 'integerOnly' => true),
            array('observacao', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
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

    public function salvarItemPorTipo($tipoItem, $itemId) {
        $model = new self;
        $model->ordem_servico_id = $this->ordem_servico_id;
        $model->tipo_item_id = $tipoItem;
        $model->item_id = $itemId;
        $model->save();
    }

    public function salvarItens($post) {
        if (!empty($post)) {
            $aItens = explode(',', $post['Produto']);
            if (!empty($aItens)) {
                foreach ($aItens as $item) {
                    $this->salvarItemPorTipo(1, $item);
                }
            }
            $aItens = explode(',', $post['Servico']);
            if (!empty($aItens)) {
                foreach ($aItens as $item) {
                    $this->salvarItemPorTipo(2, $item);
                }
            }
        }
    }

    public function getItens() {
        
    }

}