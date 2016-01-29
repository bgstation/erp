<?php

class ProdutoController extends Controller {

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
                'actions' => array('create', 'update', 'estoque', 'admin', 'delete', 'retirar'),
                'users' => array('@'),
            ),
            array('allow',
                'actions' => array(),
                'users' => array('admin'),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate($idItemNaoCadastrado = null) {
        $model = new Produto;

        $oModelos = Modelo::model()->ordenarTitulo()->naoExcluido()->findAll();
        $oMarcas = Marca::model()->ordenarTitulo()->naoExcluido()->findAll();
        $oTiposProduto = TipoProduto::model()->ordenarTitulo()->naoExcluido()->findAll();

        if (isset($_POST['Produto'])) {
            $model->attributes = $_POST['Produto'];
            if ($model->save()) {
                if (!empty(Yii::app()->user->getState('log_item_nao_cadastrado'))) {
                    $logItemNaoCadastrado = LogItemNaoCadastrado::model()->findByPk(Yii::app()->user->getState('log_item_nao_cadastrado'));
                    $logItemNaoCadastrado->scenario = 'alteracao';
                    $logItemNaoCadastrado->cadastrado = true;
                    $logItemNaoCadastrado->save();

                    $oOrdemServicoItem = OrdemServicoItem::model()->findByPk($logItemNaoCadastrado->ordem_servico_item_id);
                    $oOrdemServicoItem->scenario = 'alteracao';
                    $oOrdemServicoItem->item_id = $model->id;
                    $oOrdemServicoItem->save();
                    Yii::app()->user->setState('log_item_nao_cadastrado', NULL);
                }
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        
        if (!empty($idItemNaoCadastrado)) {
            $logItemNaoCadastrado = LogItemNaoCadastrado::model()->findByPk($idItemNaoCadastrado);
            if (!empty($logItemNaoCadastrado)) {
                Yii::app()->user->setState('log_item_nao_cadastrado', $logItemNaoCadastrado->id);
                $model->titulo = $logItemNaoCadastrado->titulo;
                $model->preco = $logItemNaoCadastrado->preco;
            }
        }

        $this->render('create', array(
            'model' => $model,
            'oModelos' => $oModelos,
            'oMarcas' => $oMarcas,
            'oTiposProduto' => $oTiposProduto,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $oModelos = Modelo::model()->ordenarTitulo()->naoExcluido()->findAll();
        $oMarcas = Marca::model()->ordenarTitulo()->naoExcluido()->findAll();
        $oTiposProduto = TipoProduto::model()->ordenarTitulo()->naoExcluido()->findAll();

        if (isset($_POST['Produto'])) {
            $model->attributes = $_POST['Produto'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'oModelos' => $oModelos,
            'oMarcas' => $oMarcas,
            'oTiposProduto' => $oTiposProduto,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Produto');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Produto('search');
        $model->unsetAttributes();
        $oSearchForm = new SearchForm();

        $oProdutos = Produto::model()->findAll();
        $aCriteria = array();
        $aProdutos = array();

        if (!empty($oProdutos)) {
            foreach ($oProdutos as $produto) {
                if (!empty($produto->tipo_produto_id)) {
                    $aProdutos['tipo_produto_id'][] = $produto->tipo_produto_id;
                }
            }
            if (!empty($aProdutos['tipo_produto_id'])) {
                $aCriteria['condition'] = 'id in (' . implode(',', $aProdutos['tipo_produto_id']) . ')';
            }
        }

        $oTiposProdutos = TipoProduto::model()->ordenarTitulo()->findAll($aCriteria);

        if (isset($_GET['Produto'])) {
            $model->attributes = $_GET['Produto'];
            $oSearchForm->request = $_GET['Produto'];
        }

        $headers = $model->getHeadersRelatorio();
        $this->exportarRelatorio($model->search(), 'Relatório Produtos - ', $headers, date('YmdHis') . '_relatorio_produtos.csv');
        
        $this->render('admin', array(
            'model' => $model,
            'oTiposProdutos' => $oTiposProdutos,
            'exibeFormularioBusca' => $oSearchForm->checaRequisicaoVazia(),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Produto the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Produto::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Produto $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'produto-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionRetirar($id) {
        $model = $this->loadModel($id);

        $oLogRetiradaProduto = new LogRetiradaProduto;

        if (!empty($_POST['LogRetiradaProduto'])) {
            if ($oLogRetiradaProduto->salvar()) {
                $model->decrementarQuantidade($_POST['LogRetiradaProduto']['quantidade']);
                $this->redirect(array('admin'));
            }
        }

        $this->render('retirar', array(
            'model' => $model,
            'oLogRetiradaProduto' => $oLogRetiradaProduto,
        ));
    }

}
