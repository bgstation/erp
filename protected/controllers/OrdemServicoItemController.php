<?php

class OrdemServicoItemController extends Controller {

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
                'actions' => array('index', 'view', 'atualizarPreco'),
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
        $model = new OrdemServicoItem;

        if (isset($_POST['OrdemServicoItem'])) {
            $model->attributes = $_POST['OrdemServicoItem'];
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

        if (isset($_POST['OrdemServicoItem'])) {
            $model->attributes = $_POST['OrdemServicoItem'];
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
        $dataProvider = new CActiveDataProvider('OrdemServicoItem');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new OrdemServicoItem('search');
        $model->unsetAttributes();
        $oSearchForm = new SearchForm();
        $oOrdemServicoItemForm = new OrdemServicoItemForm();

        if (isset($_GET['OrdemServicoItem'])) {
            $model->attributes = $_GET['OrdemServicoItem'];
            $oSearchForm->request = $_GET['OrdemServicoItem'];
        }
        
        $headers = $oOrdemServicoItemForm->getHeadersRelatorio();
        $this->exportarRelatorio($model->search(), 'Relatório de Itens das Ordens de Serviço - ', $headers, date('YmdHis') . '_relatorio_itens_ordens_servico.csv');

        $this->render('admin', array(
            'model' => $model,
            'exibeFormularioBusca' => $oSearchForm->checaRequisicaoVazia(),
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return OrdemServicoItem the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = OrdemServicoItem::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param OrdemServicoItem $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ordem-servico-item-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
