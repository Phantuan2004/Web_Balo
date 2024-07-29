<?php
function status_select_all()
{
    $sql = "SELECT * FROM product_status";
    return pdo_query($sql);
}
