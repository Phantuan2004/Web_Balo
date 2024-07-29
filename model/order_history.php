<?php
function loadall_order_history($id_order)
{
    $sql = "select * from order_history where 1";
    if ($id_order > 0) {
        $sql .= " AND id_order='" . $id_order . "'";
    }
    $sql .= " order by id desc";
    $listOrder_history =  pdo_query($sql);
    return $listOrder_history;
}
