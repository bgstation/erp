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
 * @property integer $status
 */
class Financeiro extends CActiveRecord {

    public $data_hora_inicial;
    public $data_hora_final;
    public $data_hora_inicial_grid;
    public $data_hora_final_grid;
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
        return array(
            array('tipo_item, tipo_item_id, parcelas, status', 'numerical', 'integerOnly' => true),
            array('descricao, usuario', 'length', 'max' => 200),
            array('valor', 'length', 'max' => 10),
            array('data_hora, data_hora_inicial, data_hora_final, data_hora_inicial_grid, data_hora_final_grid', 'safe'),
            array('id, tipo_item, tipo_item_id, descricao, valor, parcelas, usuario, data_hora, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
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
            'tipo_item_id' => 'ID',
            'descricao' => 'Descrição',
            'valor' => 'Valor',
            'parcelas' => 'Parcelas',
            'usuario' => 'Usuário',
            'data_hora' => 'Data',
            'status' => 'Status',
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
        $criteria->compare('status', $this->status);
        $criteria->compare('descricao', $this->descricao, true);
        $criteria->compare('valor', $this->valor, true);
        $criteria->compare('parcelas', $this->parcelas);
        $criteria->compare('usuario', $this->usuario, true);
        $criteria->compare('data_hora', $this->data_hora, true);

        if (!empty($this->data_hora_inicial) && !empty($this->data_hora_final)) {
            $this->data_hora_inicial_grid = $this->data_hora_inicial;
            $this->data_hora_final_grid = $this->data_hora_final;
            $criteria->addBetweenCondition('date(data_hora)', $this->data_hora_inicial, $this->data_hora_final);
        } else if (!empty($this->data_hora_inicial_grid) && !empty($this->data_hora_final_grid)) {
            $this->data_hora_inicial = $this->data_hora_inicial_grid;
            $this->data_hora_final = $this->data_hora_final_grid;
            $criteria->addBetweenCondition('date(data_hora)', $this->data_hora_inicial, $this->data_hora_final);
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function scopes() {
        return array(
            'ordemServico' => array(
                'condition' => 't.tipo_item = 1',
            ),
            'compras' => array(
                'condition' => 't.tipo_item = 2',
            ),
            'despesas' => array(
                'condition' => 't.tipo_item = 3',
            ),
            'ativas' => array(
                'condition' => 't.status = 0',
            ),
        );
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

    public function salvar($tipoItem, $obj, $usuarioNome = null, $status = null) {
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
                $this->usuario = $obj->usuario->nome;
                $this->valor = $obj->preco;
                break;
            case 3:
                $this->descricao = $obj->tipoDespesa->titulo;
                $this->usuario = $obj->usuario->nome;
                $this->valor = $obj->preco;
                break;
        }
        if (!empty($status)) {
            $this->status = $status;
        }
        $this->data_hora = date("Y-m-d H:i:s");
        if (!$this->save()) {
            die(var_dump($this->getErrors()));
        }
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

    public function getTotais($dataInicio = null, $dataFinal = null) {
        $aRetorno = array();
        $aRetorno['ordem_servico'] = 0;
        $aRetorno['compra'] = 0;
        $aRetorno['despesa'] = 0;
        $aCriteria = array();
        if (!empty($dataInicio) && !empty($dataFinal)) {
            $aCriteria['condition'] = ' date(data_hora) beteween "' . $dataInicio . '" AND "' . $dataFinal . '"';
        } else if (!empty($dataInicio)) {
            $aCriteria['condition'] = ' date(data_hora) beteween "' . $dataInicio . '" AND "' . date("Y-m-d") . '"';
        }
        $oFinanceiros = self::model()->ativas()->findAll($aCriteria);
        if (!empty($oFinanceiros)) {
            foreach ($oFinanceiros as $financeiro) {
                if ($financeiro->tipo_item == 1)
                    $aRetorno['ordem_servico'] += $financeiro->valor;
                if ($financeiro->tipo_item == 2)
                    $aRetorno['compra'] += $financeiro->valor;
                if ($financeiro->tipo_item == 3)
                    $aRetorno['despesa'] += $financeiro->valor;
            }
        }
        return $aRetorno;
    }

    public function getHeadersRelatorio() {
        $headers = array(
            'tipo',
            'tipo_item_id',
            'status',
            'descricao',
            'valor',
            'parcelas',
            'usuario',
            'datahora',
        );
        return $headers;
    }

}
