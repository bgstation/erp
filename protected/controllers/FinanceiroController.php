<?php

class FinanceiroController extends Controller {

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
                'actions' => array('create', 'update', 'admin', 'delete'),
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
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Financeiro;

        if (isset($_POST['Financeiro'])) {
            $model->attributes = $_POST['Financeiro'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['Financeiro'])) {
            $model->attributes = $_POST['Financeiro'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
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
        $dataProvider = new CActiveDataProvider('Financeiro');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Financeiro('search');
        $model->unsetAttributes();
        $oSearchForm = new SearchForm();
        $oFinanceiroForm = new FinanceiroForm();

        if (isset($_GET['Financeiro'])) {
            $model->attributes = $_GET['Financeiro'];
            $oSearchForm->request = $_GET['Financeiro'];
        } else {
            $model->data_hora_inicial_grid = date('Y-m-d');
            $model->data_hora_final_grid = date('Y-m-d');
        }

        $headers = $oFinanceiroForm->getHeadersRelatorio();
        $this->exportarRelatorio($model->search(), 'Relatório Financeiro - ', $headers, date('YmdHis') . '_relatorio_financeiro.csv');

        $oLogCaixa = new LogCaixa;
        $aValoresCaixa = $oLogCaixa->getValores();

        $this->render('admin', array(
            'model' => $model,
            'oTotalCompras' => $model->getTotalCompras(),
            'oTotalDespesas' => $model->getTotalDespesas(),
            'oTotalOrdemServico' => $model->getTotalOrdemServico(),
            'oTotalOrdemServicoDinheiro' => $model->getTotalOrdemServicoDinheiro(),
            'oTotalOrdemServicoDinheiroParcial' => $model->getTotalOrdemServicoDinheiro($aValoresCaixa['data_inicio']),
            'oTotalOrdemServicoCartaoCredito' => $model->getTotalOrdemServicoCartaoCredito(),
            'oTotalOrdemServicoCartaoDebito' => $model->getTotalOrdemServicoCartaoDebito(),
            'exibeFormularioBusca' => $oSearchForm->checaRequisicaoVazia(),
            'oFinanceiroForm' => $oFinanceiroForm,
            'aValoresCaixa' => $aValoresCaixa,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Financeiro the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Financeiro::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Financeiro $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'financeiro-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
