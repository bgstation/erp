<?php

class ClienteController extends Controller {

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
        $oClienteCarro = new ClienteCarro;

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'oClienteCarro' => $oClienteCarro,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $this->pageTitle = Yii::app()->name . ' - Cadastro de clientes';
        $model = new Cliente;

        if (isset($_POST['Cliente'])) {
            $model->attributes = $_POST['Cliente'];
            $model->data_cadastro = date('d/m/Y H:i:s');
            if ($model->save())
                $this->redirect(array('clienteCarro/create', 'clienteId' => $model->id));
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

        if (isset($_POST['Cliente'])) {
            $model->attributes = $_POST['Cliente'];
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
        $dataProvider = new CActiveDataProvider('Cliente');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Cliente('search');
        $model->unsetAttributes();
        $oSearchForm = new SearchForm();

        if (!empty($_GET['Cliente'])) {
            $model->attributes = $_GET['Cliente'];
            $oSearchForm->request = $_GET['Cliente'];
        }

        $headers = $model->getHeadersRelatorio();
        $this->exportarRelatorio($model->search(), 'Relatório Clientes - ', $headers, date('YmdHis') . '_relatorio_clientes.csv');

        $this->render('admin', array(
            'model' => $model,
            'exibeFormularioBusca' => $oSearchForm->checaRequisicaoVazia(),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Cliente the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Cliente::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Cliente $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cliente-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
