<?php

class ClienteCarroController extends Controller {

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
                'actions' => array('create', 'update', 'admin', 'delete', 'getDataJson'),
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
        $model = new ClienteCarro;

        $oMarcas = Marca::model()->naoExcluido()->ordenarTitulo()->findAll();
        $oCliente = Cliente::model()->findByPk($_GET['clienteId']);
        $oCores = Cor::model()->naoExcluido()->ordenarTitulo()->findAll();

        if (isset($_POST['ClienteCarro'])) {
            $model->attributes = $_POST['ClienteCarro'];
            if ($model->save()) {
                if ($_POST['abrir_os'] == "true") {
                    $this->redirect(array('ordemServico/create', 'clienteId' => $model->cliente_id, 'clienteCarroId' => $model->id));
                } else {
                    $this->redirect(array('cliente/view', 'id' => $model->cliente_id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'oMarcas' => $oMarcas,
            'oCliente' => $oCliente,
            'oCores' => $oCores,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        $oMarcas = Marca::model()->naoExcluido()->ordenarTitulo()->findAll();
        $oCliente = Cliente::model()->findByPk($_GET['clienteId']);
        $oCores = Cor::model()->naoExcluido()->ordenarTitulo()->findAll();

        if (isset($_POST['ClienteCarro'])) {
            $model->attributes = $_POST['ClienteCarro'];
            if ($model->save())
                if ($_POST['abrir_os'] == "true") {
                    $this->redirect(array('ordemServico/create', 'clienteId' => $model->cliente_id, 'clienteCarroId' => $model->id));
                } else {
                    $this->redirect(array('cliente/view', 'id' => $model->cliente_id));
                }
        }

        $this->render('update', array(
            'model' => $model,
            'oMarcas' => $oMarcas,
            'oCliente' => $oCliente,
            'oCores' => $oCores,
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
        $dataProvider = new CActiveDataProvider('ClienteCarro');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ClienteCarro('search');
        $model->unsetAttributes();
        $oSearchForm = new SearchForm();

        if (isset($_GET['ClienteCarro'])) {
            $model->attributes = $_GET['ClienteCarro'];
            $oSearchForm->request = $_GET['ClienteCarro'];
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
     * @return ClienteCarro the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ClienteCarro::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ClienteCarro $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'cliente-carro-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionGetDataJson() {
        $array = array();
        $oModels = ClienteCarro::model()->naoExcluido()->ordenarPlaca()->findAllByAttributes(array('cliente_id' => $_POST['clienteId']));
        $i = 0;
        if (!empty($oModels)) {
            foreach ($oModels as $model) {
                $array[$i]['id'] = intval($model->id);
                $array[$i]['text'] = strtoupper($model->placa);
                $i++;
            }
        }
        echo json_encode($array);
    }

}
