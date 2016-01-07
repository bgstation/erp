<?php

/**
 * @property Usuario $model Atalho para Yii::app()->user->getModel(): Yii::app()->user->model
 */
class WebUser extends CWebUser {

    /**
     * @var Usuario
     */
    protected $modelObject;

    /**
     * @return Usuario
     */
    public function getModel() {
        if ($this->modelObject === null) {
            $this->modelObject = Usuario::model()->findByPk($this->id);
        }
        return $this->modelObject;
    }

    /**
     * Performs access check for this user.
     * @param string $operation the name of the operation that need access check.
     * @param array $params name-value pairs that would be passed to business rules associated
     * with the tasks and roles assigned to the user.
     * @param boolean $allowCaching whether to allow caching the result of access check.
     * This parameter has been available since version 1.0.5. When this parameter
     * is true (default), if the access check of an operation was performed before,
     * its result will be directly returned when calling this method to check the same operation.
     * If this parameter is false, this method will always call {@link CAuthManager::checkAccess}
     * to obtain the up-to-date access result. Note that this caching is effective
     * only within the same request.
     * @return boolean whether the operations can be performed by this user.
     */
    public function checkAccess($operation, $params = array(), $allowCaching = true) {
        if ($this->isGuest) {
            return false;
        }

        $operations = (array) $operation;

        $oUsuario = Usuario::model()->findByPk(Yii::app()->user->getId());

        foreach ($operations as $operation) {

            $rolesDesignadas = Yii::app()->authManager->getRoles(Yii::app()->user->id);

            if (empty($rolesDesignadas)) {
                Yii::app()->authManager->assign(
                        $oUsuario->acl_tipo_usuario->titulo, $this->id
                );
            }

            if (Yii::app()->authManager->isAssigned($operation, $this->id)) {
                return true;
            }

            $ret = $this->roleHasChild($oUsuario->acl_tipo_usuario->titulo, $operation);

            if ($ret) {
                return true;
            }
        }
        return false;
    }

    protected function roleHasChild($role, $child) {
        foreach (Yii::app()->authManager->getItemChildren($role) as $role) {

            if ($role->name == $child || $this->roleHasChild($role->name, $child)) {
                return true;
            }
        }

        return false;
    }

    public function checkAccessCadastro() {
        if (Yii::app()->user->checkAccess('cupomDesconto/admin') ||
                Yii::app()->user->checkAccess('depoimento/admin') ||
                Yii::app()->user->checkAccess('administrador/materialGratuitoAdmin') ||
                Yii::app()->user->checkAccess('news/admin') ||
                Yii::app()->user->checkAccess('administrador/parceiro') ||
                Yii::app()->user->checkAccess('pacote/admin') ||
                Yii::app()->user->checkAccess('produto/admin') ||
                Yii::app()->user->checkAccess('quiz/admin') ||
                Yii::app()->user->checkAccess('administrador/perguntas') ||
                Yii::app()->user->checkAccess('administrador/simulados') ||
                Yii::app()->user->checkAccess('textoSite/admin') ||
                Yii::app()->user->checkAccess('voucher/cadastroAdminVoucher')
        ) {
            return true;
        }
        return false;
    }

    public function checkAccessRelatorio() {
        if (Yii::app()->user->checkAccess('pedido/relatorioAdminExpiracaoPedido') ||
                Yii::app()->user->checkAccess('administrador/relatorioAdminNewsletter') ||
                Yii::app()->user->checkAccess('administrador/relatorioRedacoes') ||
                Yii::app()->user->checkAccess('administrador/relatorioValoresApresentados') ||
                Yii::app()->user->checkAccess('administrador/relatorioGeralVendasConsolidado') ||
                Yii::app()->user->checkAccess('financeiro/relatorioVendasTutorNovoAdmin') ||
                Yii::app()->user->checkAccess('voucherPorUsuario/relatorioAdminVoucherPorUsuario') ||
                Yii::app()->user->checkAccess('produtoPedido/vendasPorProduto') ||
                Yii::app()->user->checkAccess('administrador/rankingAcessosProdutos') ||
                Yii::app()->user->checkAccess('financeiro/rankingVendas')
        ) {
            return true;
        }
        return false;
    }

    public function checkAccessSistema() {
        if (Yii::app()->user->checkAccess('administrador/aoVivoConfiguracoes') ||
                Yii::app()->user->checkAccess('configuracao/admin') ||
                Yii::app()->user->checkAccess('linkUtil/linksUtilNovoAdmin') ||
                Yii::app()->user->checkAccess('pagina/admin') ||
                Yii::app()->user->checkAccess('administrador/permissaoAdmin') ||
                Yii::app()->user->checkAccess('administrador/produtosDestaque') ||
                Yii::app()->user->checkAccess('sitemap/admin')
        ) {
            return true;
        }
        return false;
    }

}
