<?php

/**
 * This is the model class for table "ordens_servico".
 *
 * The followings are the available columns in table 'ordens_servico':
 * @property integer $id
 * @property integer $cliente_id
 * @property integer $cliente_carro_id
 * @property integer $forma_pagamento_id
 * @property string $observacao
 * @property integer $excluido
 */
class OrdemServico extends CActiveRecord {
    
    public $status;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'ordens_servico';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        return array(
            array('cliente_id, cliente_carro_id, forma_pagamento_id, excluido', 'numerical', 'integerOnly' => true),
            array('observacao, status', 'safe'),
            array('cliente_id, cliente_carro_id', 'required'),
            array('id, cliente_id, cliente_carro_id, forma_pagamento_id, observacao, excluido', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        return array(
            'ordemServicoItens' => array(self::HAS_MANY, 'OrdemServicoItem', 'ordem_servico_id'),
            'ordemServicoTipoPagamento' => array(self::HAS_MANY, 'OrdemServicoTipoPagamento', 'ordem_servico_id'),
            'logsOrdemServico' => array(self::HAS_MANY, 'LogOrdemServico', 'ordem_servico_id'),
            'cliente' => array(self::BELONGS_TO, 'Cliente', 'cliente_id'),
            'clienteCarro' => array(self::BELONGS_TO, 'ClienteCarro', 'cliente_carro_id'),
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
            'id' => 'Número',
            'cliente_id' => 'Cliente',
            'cliente_carro_id' => 'Placa do carro',
            'forma_pagamento_id' => 'Forma de pagamento',
            'observacao' => 'Observação',
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
        $aJoin = array();

        $criteria->select = 't.*';
        $criteria->compare('t.id', $this->id);
        $criteria->compare('forma_pagamento_id', $this->forma_pagamento_id);
        $criteria->compare('t.observacao', $this->observacao, true);
        $criteria->compare('t.excluido', $this->excluido);

        if (!empty($this->cliente_id)) {
            $aJoin[] = 'JOIN clientes cliente ON cliente.id = t.cliente_id';
            $criteria->addCondition("cliente.nome like '%" . $this->cliente_id . "%'");
        }
        if (!empty($this->cliente_carro_id)) {
            $aJoin[] = 'JOIN clientes_carros cliente_carro ON cliente_carro.id = t.cliente_carro_id';
            $criteria->addCondition("cliente_carro.placa like '%" . $this->cliente_carro_id . "%'");
        }
        if (!empty($this->status)) {
            $aJoin[] = 'JOIN log_ordens_servico log ON log.ordem_servico_id = t.id';
            $criteria->group = 't.id';
            $criteria->having = 'max(log.status) = ' . $this->status;
        }
        if (!empty($aJoin)) {
            $criteria->join = implode(' ', $aJoin);
        }

        $criteria->addCondition('t.excluido = false');

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return OrdemServico the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getValorTotal() {
        $valor_total = 0;
        if (!empty($this->ordemServicoItens)) {
            foreach ($this->ordemServicoItens as $item) {
                if ($item->item_id != 0) {
                    if ($item->tipo_item_id == 1) {
                        $valor_total = $valor_total + $item->produto->preco;
                    }
                    if ($item->tipo_item_id == 2) {
                        $valor_total = $valor_total + $item->servico->preco;
                    }
                } else {
                    $oLogItemNaoCadastrado = LogItemNaoCadastrado::model()->findByAttributes(array(
                        'ordem_servico_item_id' => $item->id,
                    ));
                    $valor_total = $valor_total + $oLogItemNaoCadastrado->preco;
                }
            }
        }
        return $valor_total;
    }

    public function finalizarOS() {
        if (!empty($_POST['OrdemServicoTipoPagamento'])) {
            if(!empty($_POST['OrdemServico']['desconto'])){
                $this->desconto = $_POST['OrdemServico']['desconto'];
                $this->save();
            }
            $oLogOrdemServico = new LogOrdemServico;
            $oLogOrdemServico->status = 2;
            $oLogOrdemServico->ordem_servico_id = $this->id;
            $oLogOrdemServico->observacao = $_POST['LogOrdemServico']['observacao'];
            if ($oLogOrdemServico->salvarLog()) {
                foreach ($_POST['OrdemServicoTipoPagamento'] as $post) {
                    if (!empty($post['forma_pagamento_id'])) {
                        $oOrdemServicoTipoPagamento = new OrdemServicoTipoPagamento;
                        $oOrdemServicoTipoPagamento->ordem_servico_id = $this->id;
                        $oOrdemServicoTipoPagamento->forma_pagamento_id = $post['forma_pagamento_id'];
                        $oOrdemServicoTipoPagamento->valor = $post['valor'];
                        $oOrdemServicoTipoPagamento->parcelas = $post['parcelas'];
                        $oOrdemServicoTipoPagamento->save();
                    }
                }
                return true;
            }
        }
        return false;
    }
    
    public function getStatus() {
        $oLogOrdemServico = LogOrdemServico::model()->ultimoRegistro()->findByAttributes(array(
            'ordem_servico_id' => $this->id
        ));
        return $oLogOrdemServico->status;
    }
    
    public function getTituloStatus() {
        $oLogOrdemServico = new LogOrdemServico();
        return $oLogOrdemServico->aStatus[$this->getStatus()];
    }
    
    public function marcarExcluido(){
        $this->excluido = 1;
        $this->save();
    }

}
