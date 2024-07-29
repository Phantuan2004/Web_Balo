<?php
require_once 'pdo.php';

function loadall_account($id_account)
{
    $sql = "select * from account where 1";
    if ($id_account != "") {
        $sql .= " and user like '%" . $id_account . "%'";
    }
    return pdo_query($sql);
}

function account_insert($user, $password, $name, $email, $phone, $address, $role = 2)
{
    $sql = "INSERT INTO account(user, password, name, email, phone, address, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
    pdo_execute($sql, $user, $password, $name, $email, $phone, $address, $role);
}

function checkuser($user, $password, $role)
{
    $sql = "select * from account where user = ? AND password = ? AND role = ?";
    $sp = pdo_query_one($sql, $user, $password, $role);
    return $sp;
}

function dangxuat()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
}

function checkemail($email)
{
    $sql = "select * from account where email='" . $email . "'";
    $sp = pdo_query_one($sql);
    return $sp;
}

// function sendMail($email) {
//     $sql="SELECT * FROM account WHERE email='$email'";
//     $taikhoan = pdo_query_one($sql);

//     if ($taikhoan != false) {
//         sendMailPass($email, $taikhoan['user'], $taikhoan['password']);

//         return "gui email thanh cong";
//     } else {
//         return "Email bạn nhập ko có trong hệ thống";
//     }
// }

// function sendMailPass($email, $user, $password) {
//     require 'PHPMailer/src/Exception.php';
//     require 'PHPMailer/src/PHPMailer.php';
//     require 'PHPMailer/src/SMTP.php';

//     $mail = new PHPMailer\PHPMailer\PHPMailer(true);

//     try {
//         //Server settings
//         $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_OFF;                      //Enable verbose debug output
//         $mail->isSMTP();                                            //Send using SMTP
//         $mail->Host       = 'sandbox.smtp.mailtrap.io';                     //Set the SMTP server to send through
//         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
//         $mail->Username   = '6bda0a4c1abcfc';                     //SMTP username
//         $mail->Password   = '4430da6c8b9967';                               //SMTP password
//         $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
//         $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//         //Recipients
//         $mail->setFrom('duanmau@example.com', 'DuAnMau');
//         $mail->addAddress($email, $user);     //Add a recipient

//         //Content
//         $mail->isHTML(true);                                  //Set email format to HTML
//         $mail->Subject = 'Nguoi dung quen mat khau';
//         $mail->Body    = 'Mau khau cua ban la' .$password;

//         $mail->send();
//     } catch (Exception $e) {
//         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
//     }
// }


function account_update($iduser, $user, $name, $password, $email, $phone, $address, $role)
{
    $sql = "UPDATE account SET user=?, password=?, name=?, email=?, phone=?, address=?, role=? WHERE iduser=?";
    pdo_execute($sql, $user, $password, $name, $email, $phone, $address, $role, $iduser);
}

function account_edit($iduser, $user, $password, $email, $phone, $address, $role)
{
    $sql = "UPDATE account SET user=?, password=?, email=?, phone=?, address=?, role=? WHERE iduser=?";
    pdo_execute($sql, $user, $password, $email, $phone, $address, $role, $iduser);
}

function account_delete($iduser)
{
    $sql = "DELETE FROM account  WHERE iduser=?";
    if (is_array($iduser)) {
        foreach ($iduser as $id) {
            pdo_execute($sql, $id);
        }
    } else {
        pdo_execute($sql, $iduser);
    }
}

function account_select_all()
{
    $sql = "SELECT * FROM account";
    return pdo_query($sql);
}

function account_select_by_id($iduser)
{
    $sql = "SELECT * FROM account WHERE iduser=?";
    return pdo_query_one($sql, $iduser);
}


function account_exist($iduser)
{
    $sql = "SELECT count(*) FROM account WHERE $iduser=?";
    return pdo_query_value($sql, $iduser) > 0;
}

function account_change_password($iduser, $password)
{
    $sql = "UPDATE account SET password=? WHERE iduser=?";
    pdo_execute($sql, $password, $iduser);
}
