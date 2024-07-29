<?php

/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    try {
        $conn = new PDO("mysql:host=$servername;dbname=project_web_balo", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
        return null; // Trả về null nếu có lỗi
    }
}

/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute($sql, ...$params)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        // Nếu params không phải là mảng, chuyển nó thành mảng
        if (!is_array($params[0])) {
            $params = [$params];
        }
        $stmt->execute(...$params);
    } catch (PDOException $e) {
        throw $e;
    }
}

function pdo_execute_all($sql, ...$params)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);

        // Trường hợp params không phải là mảng
        if (!isset($params[0]) || !is_array($params[0])) {
            $params = [$params];
        }

        // Dùng call_user_func_array để truyền params chính xác
        call_user_func_array([$stmt, 'execute'], $params);
    } catch (PDOException $e) {
        throw $e;
    }
}


function pdo_execute_return_lastInsertId($sql, ...$params)
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        // Nếu params không phải là mảng, chuyển nó thành mảng
        if (!is_array($params[0])) {
            $params = [$params];
        }
        $stmt->execute(...$params);
        return $conn->lastInsertId();
    } catch (PDOException $e) {
        throw $e;
    }
}


/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query($sql, $params = [])
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một bản ghi với tên cột
 * @param string $sql câu lệnh sql
 * @param array $params mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 */
function pdo_query_one_name($sql, $params = [])
{
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($params);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result : false;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}

/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
