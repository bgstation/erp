<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

//    protected function beforeAction($action) {
//        $aNaoVerificar = array(
//            0 => 'site/semPermissao',
//            1 => 'site/logout',
//            2 => 'site/login',
//            3 => 'site/index',
//            8 => 'site/error',
//        );
//        if (!in_array(Yii::app()->controller->id . '/' . Yii::app()->controller->action->id, $aNaoVerificar)) {
//            if (!Yii::app()->user->checkAccess(Yii::app()->controller->id . '/' . Yii::app()->controller->action->id)) {
//                $this->redirect(array('site/semPermissao'));
//            }
//        }
//        return parent::beforeAction($action);
//    }
    
    public function behaviors() {
        return array(
            'exportableGrid' => array(
                'class' => 'application.components.ExportableGridBehavior',
                'csvDelimiter' => ';',
        ));
    }
    
    /**
     * @param model $model Modelo a ser exportado
     * @param string $nomeRelatorio Nome do relatorio que será exportado
     * @param array $headers cabeçalho do arquivo
     * @param string $filename Nome do arquivo
     * @return file Efetua o download de um csv
     */
    public function exportarRelatorio($model, $nomeRelatorio, $headers, $filename) {
        if ($this->isExportRequest()) {
            $this->setFilename($filename);
            $this->exportCSV(array($nomeRelatorio . date('d/m/Y H:i:s')), null, false);
            $this->exportCSV($model, $headers);
        }
    }

}
