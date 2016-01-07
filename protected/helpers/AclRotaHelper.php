<?php

class AclRotaHelper {

    public static function renderAclRotas($aAclRotas, $aAclTipoUsuarioRotas) {
        $return = '';
        if (!empty($aAclRotas)) {
            foreach ($aAclRotas as $categoria => $aValue) {
                $search = explode(",", "ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u");
                $replace = explode(",", "c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u");
                $categoriaNew = str_replace($search, $replace, str_replace(' ', '_', $categoria));
                $categoriaParam = "'" . $categoriaNew . "'";
                $return .= '<table class="acl_section">
                    <thead>
                        <tr>';
                $return .= '<th>' . ucfirst($categoria) . '</th>
                            <th><input onclick="selecionarTodos(' . $categoriaParam . ')" class="pai_' . $categoriaNew . '" type="checkbox"></th>
                        </tr>
                    </thead>';
                $return .= '<tbody>';
                foreach ($aValue as $value) {
                    $checked = '';
                    if (in_array($value['id'], $aAclTipoUsuarioRotas))
                        $checked = 'checked';

                    $return .= '<tr>';
                    $return .= '<td class="acl_item">' . $value['titulo'];
                    $return .= '</td>';
                    $return .= '<td class="acl_item"><input ' . $checked . ' class="' . $categoriaNew . '" type="checkbox" value="' . $value['id'] . '" name="AclTipoUsuarioRotas[]">';
                    $return .= '</td>';
                    $return .= '</tr>';
                }
                $return .= '</tbody>
        </table>';
            }
        }

        return $return;
    }

}
