<?php

class DashboardHelper {

    public static function renderItensNaoCadastrados($oLogItemNaoCadastrado) {
        $return = '';
        foreach ($oLogItemNaoCadastrado as $item) {
            $return .= '<li><a href="' . Yii::app()->createUrl('logItemNaoCadastrado/update', array('id' => $item->id)) . '">';
            $return .= '<i class="fa fa-plus-square"></i> ' . $item->titulo . ' - R$ ' . FormatHelper::valorMonetario($item->preco) . '</a>';
            $return .= '</li>';
        }
        return $return;
    }

}
