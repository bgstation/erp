<?php if (!empty($oLogItemNaoCadastrado)) : ?>
    <h4>Você possui <?= count($oLogItemNaoCadastrado) ?> itens não cadastrados no sistema:</h4>
    <ul>
        <?= DashboardHelper::renderItensNaoCadastrados($oLogItemNaoCadastrado) ?>
    </ul>
<?php else : ?>
    <h4>Você não possui avisos.</h4>
<?php endif; ?>
