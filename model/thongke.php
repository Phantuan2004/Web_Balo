<?php
require_once 'pdo.php';

function list_product()
{
    $sql = "SELECT products.id_product, products.product_name,"
        . " products.product_old_price price_old,"
        . " products.product_new_price price_new"
        . " FROM products "
        . " JOIN category ON category.id_category=products.id_category "
        . " GROUP BY products.id_product, products.product_name";
    return pdo_query($sql);
}

function listed_products()
{
    $sql = "SELECT products.id_product, products.product_name,  
                            SUM(cart.product_quantity) AS total_product 
                        FROM products 
                        JOIN cart ON products.id_product = cart.id_product 
                        JOIN bill ON bill.id_bill = cart.id_bill 
                        WHERE bill.status = 0 
                        GROUP BY products.id_product, products.product_name 
                        ORDER BY total_product DESC";
    return pdo_query($sql);
}

function list_comment()
{
    $sql = "SELECT comment.id, comment.iduser, comment.id_product, comment.content, comment.date, 
                COUNT(comment.id) 'quantity'
                FROM comment
                JOIN products ON products.id_product = comment.id_product
                GROUP BY comment.id, comment.iduser, comment.id_product, comment.content, comment.date 
                order by quantity DESC ";
    return pdo_query($sql);
}

function listed_comment()
{
    $sql = "SELECT comment.id_product, 
                        COUNT(comment.id) AS quantity
                        FROM comment
                        JOIN products ON comment.id_product = products.id_product
                        GROUP BY products.id_product
                        ORDER BY quantity DESC";
    return pdo_query($sql);
}

function list_category()
{
    $sql = "SELECT category.id_category, category.category_name, 
    COUNT(*) 'quantity', 
    MIN(product_new_price) 'gia_min', 
    MAX(product_new_price) 'gia_max', 
    AVG(product_new_price) 'gia_avg' 
    FROM category JOIN products ON category.id_category=products.id_category 
    GROUP BY category.id_category, category.category_name ORDER BY quantity DESC ";
    return pdo_query($sql);
}
