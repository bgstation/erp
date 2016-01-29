<?php

class OrdemServicoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl',
            'postOnly + delete',
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow',
                'actions' => array('create', 'update', 'admin', 'delete', 'getItensPorTipoJson', 'finalizar', 'cancelar'),
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $oLogsOrdemServico = LogOrdemServico::model()->findAllByAttributes(array(
            'ordem_servico_id' => $id
        ));
        $this->render('view', array(
            'model' => $this->loadModel($id),
            'oOrdemServicoFormaPagamento' => new OrdemServicoTipoPagamento,
            'oLogsOrdemServico' => $oLogsOrdemServico,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new OrdemServico;
        if (!empty($_GET['clienteId']))
            $model->cliente_id = $_GET['clienteId'];
        if (!empty($_GET['clienteCarroId']))
            $model->cliente_carro_id = $_GET['clienteCarroId'];

        $oClientes = Cliente::model()->ordemNome()->findAll();
        $oOrdemServicoItem = new OrdemServicoItem;
        $oLogItemNaoCadastrador = new LogItemNaoCadastrado;

        $oServicos = Servico::model()->ordenarTitulo()->naoExcluido()->findAll();
        $oProdutos = Produto::model()->ordenarTitulo()->naoExcluido()->findAll();

        if (isset($_POST['OrdemServico'])) {
            $model->attributes = $_POST['OrdemServico'];
            if ($model->save()) {
                $oLogOrdemServico = new LogOrdemServico;
                $oLogOrdemServico->status = 1;
                $oLogOrdemServico->ordem_servico_id = $model->id;
                $oLogOrdemServico->observacao = $_POST['OrdemServico']['observacao'];
                $oLogOrdemServico->salvarLog();
                if (!empty($_POST['OrdemServicoItem'])) {
                    $oOrdemServicoItem->ordem_servico_id = $model->id;
                    $oOrdemServicoItem->salvarItens($_POST['OrdemServicoItem']);
                }
                if (!empty($_POST['LogItemNaoCadastrado'])) {
                    $oOrdemServicoItem->salvarItensNaoCadastrados($_POST['LogItemNaoCadastrado']);
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
            'oClientes' => $oClientes,
            'oOrdemServicoItem' => $oOrdemServicoItem,
            'valor_total' => $model->getValorTotal(),
            'oLogItemNaoCadastrador' => $oLogItemNaoCadastrador,
            'oServicos' => $oServicos,
            'oProdutos' => $oProdutos,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $oClientes = Cliente::model()->ordemNome()->findAll();
        $oLogItemNaoCadastrador = new LogItemNaoCadastrado();
        $oOrdemServicoItem = new OrdemServicoItem();

        $oServicos = Servico::model()->ordenarTitulo()->naoExcluido()->findAll();
        $oProdutos = Produto::model()->ordenarTitulo()->naoExcluido()->findAll();

        if (isset($_POST['OrdemServico'])) {
            $model->attributes = $_POST['OrdemServico'];
            if ($model->save()) {
                if (!empty($_POST['OrdemServicoItem'])) {
                    $oOrdemServicoItem->ordem_servico_id = $model->id;
                    $oOrdemServicoItem->salvarItens($_POST['OrdemServicoItem']);
                }
                if (!empty($_POST['LogItemNaoCadastrado'])) {
                    $oOrdemServicoItem->salvarItensNaoCadastrados($_POST['LogItemNaoCadastrado']);
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('update', array(
            'model' => $model,
            'oClientes' => $oClientes,
            'oOrdemServicoItem' => $oOrdemServicoItem,
            'valor_total' => $model->getValorTotal(),
            'oLogItemNaoCadastrador' => $oLogItemNaoCadastrador,
            'oServicos' => $oServicos,
            'oProdutos' => $oProdutos,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->marcarExcluido();

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('OrdemServico');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new OrdemServico('search');
        $model->unsetAttributes();
        $oSearchForm = new SearchForm();

        if (isset($_GET['OrdemServico'])) {
            $model->attributes = $_GET['OrdemServico'];
            $oSearchForm->request = $_GET['OrdemServico'];
        }

        $this->render('admin', array(
            'model' => $model,
            'exibeFormularioBusca' => $oSearchForm->checaRequisicaoVazia(),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return OrdemServico the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = OrdemServico::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param OrdemServico $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ordem-servico-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGetItensPorTipoJson() {
        if (!empty($_POST['tipoItemId'])) {
            if (!empty($_POST['tipoItemId']) && $_POST['tipoItemId'] == 1) {
                $oProduto = new Produto;
                echo CJSON::encode($oProduto->getDataJson());
            }
            if (!empty($_POST['tipoItemId']) && $_POST['tipoItemId'] == 2) {
                $oServico = new Servico;
                echo CJSON::encode($oServico->getDataJson());
            }
        }
    }

    public function actionFinalizar($id) {
        $model = $this->loadModel($id);

        $oClientes = Cliente::model()->ordemNome()->findAll();
        $oOrdemServicoItem = new OrdemServicoItem();
        $oLogItemNaoCadastrador = new LogItemNaoCadastrado();
        $oLogOrdemServico = LogOrdemServico::model()->aberta()->findByAttributes(array(
            'ordem_servico_id' => $id,
        ));
        $oOrdemServicoTipoPagamento = new OrdemServicoTipoPagamento();

        if (isset($_POST['OrdemServicoTipoPagamento'])) {
            if ($model->finalizarOS()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('finalizar', array(
            'model' => $model,
            'oClientes' => $oClientes,
            'oOrdemServicoItem' => $oOrdemServicoItem,
            'valor_total' => $model->getValorTotal(),
            'oLogItemNaoCadastrador' => $oLogItemNaoCadastrador,
            'oLogOrdemServico' => $oLogOrdemServico,
            'oOrdemServicoTipoPagamento' => $oOrdemServicoTipoPagamento,
        ));
    }

    public function actionCancelar() {
        $aRetorno = array();
        $aRetorno['status'] = 'error';
        if (!empty($_GET['id'])) {
            $oLogOrdemServico = new LogOrdemServico;
            $oLogOrdemServico->status = 3;
            $oLogOrdemServico->ordem_servico_id = $_GET['id'];
            if ($oLogOrdemServico->salvarLog()) {
                $aRetorno['status'] = 'success';
            } else {
                $aRetorno['errors'] = $oLogOrdemServico->getErrors();
            }
        }
        die(CJSON::encode($aRetorno));
    }

}
