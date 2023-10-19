<?php
session_start();
$connection = mysqli_connect("localhost", "root", "", "bdmw");

//login
if (isset($_POST['login-btn'])) {
    /*  $email = mysqli_real_escape_string($connection , $_POST['email']); 
    $password = mysqli_real_escape_string($connection , $_POST['password']);   */

    $first_name =  $_POST['first_name'];
    $password_hash =  $_POST['password_hash'];
    $usertype =  $_POST['usertype'];

    $query = "
        SELECT * FROM `users`
        WHERE `first_name`='$first_name' AND `password_hash`='$password_hash' AND `usertype`='$usertype'
        ";
    $query_run = mysqli_query($connection, $query);

    if (mysqli_fetch_array($query_run)) {

        if ($usertype == "Supervisor") {
            $_SESSION['username'] = $first_name;
            $_SESSION['usertype'] = $usertype;
            header('location:index.php');
        } else if ($usertype == "User") {
            $_SESSION['username'] = $first_name;
            $_SESSION['usertype'] = $usertype;
            header('location:index.php');
        } else if ($usertype == "Merchant") {
            $_SESSION['username'] = $first_name;
            $_SESSION['usertype'] = $usertype;
            header('location:index.php');
        } else if ($usertype == "Admin") {
            $_SESSION['username'] = $first_name;
            $_SESSION['usertype'] = $usertype;
            header('location:index.php');
        }
    } else {
        $_SESSION['status'] = "Email or Password or Auothority is invalid";
        $_SESSION['status_code'] = "warning";
        header('location:auth-signin.php');
    }
}

if (isset($_POST['logout-btn'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['usertype']);
    header('location:auth-signin.php');
}


//register
if (isset($_POST['registerbtn'])) {
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $usertype = $_POST['usertype'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $email_query = "SELECT * FROM `users` WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if (mysqli_num_rows($email_query_run) > 0) {
        $_SESSION['status'] = "email already exist";
        header('location:users.php');
    } else {

        if ($password === $cpassword) {
            $query = "
            INSERT INTO `users`(first_name,email,password_hash,usertype)
            VALUES ('$first_name','$email','$password','$usertype')
            ";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                $_SESSION['status'] = "Adding Succesfully";
                $_SESSION['status_code'] = "success";
                header('location:users.php');
            } else {
                $_SESSION['status'] = "Adding Faild";
                $_SESSION['status_code'] = "warning";
                header('location:users.php');
            }
        } else {
            $_SESSION['status'] = "Password didn't confirmed";
            $_SESSION['status_code'] = "warning";
            header('location:users.php');
        }
    }
}

if (isset($_POST['DeleteBtn'])) {
    $id = $_POST['DeleteId'];

    $query = "
            DELETE FROM `users` WHERE `id` = '$id'
            ";
    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "User has been deleted";
        $_SESSION['status_code'] = "success";
        header('location:users.php');
    } else {
        $_SESSION['status'] = "User not deleted";
        $_SESSION['status_code'] = "warning";
        header('location:users.php');
    }
}

if (isset($_POST['UpdateBtn'])) {
    $id = $_POST['id'];
    $first_name = $_POST['edit-user'];
    $email = $_POST['edit-email'];
    $password_hash = $_POST['edit-password '];



    $query = "
            UPDATE `users` 
            SET `first_name` = '$first_name', `email` = '$email' , `password_hash` = '$password_hash'
            WHERE `id`='$id'
            ";
          /*   "
            UPDATE users SET ( password_hash, usertype, first_name, email ) 
            VALUES ($password_hash, $usertype, $first_name, $email) WHERE id = $id;
            "; */

    $query_run = mysqli_query($connection, $query);

    if ($query_run) {
        $_SESSION['status'] = "Updating Success";
        $_SESSION['status_code'] = "success";
        header('location:users.php');
    } else {
        $_SESSION['status'] = "Updating User Failed";
        $_SESSION['status_code'] = "error";
        header('location:users.php');
    }
}

//area
if (isset($_POST['areabtn'])) {
    $area = $_POST['area'];

        
            $query = "
            INSERT INTO `area` (`area-name`) VALUES ('$area');
            ";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                $_SESSION['status'] = "Adding Succesfully";
                $_SESSION['status_code'] = "success";
                header('location:area-manage.php');
            } else {
                $_SESSION['status'] = "Adding Faild";
                $_SESSION['status_code'] = "warning";
                header('location:area-manage.php');
            }
        } 

        if (isset($_POST['DeleteBtnArea'])) {
            $id = $_POST['DeleteId'];
        
            $query = "
                    DELETE FROM `area` WHERE `id` = '$id'
                    ";
            $query_run = mysqli_query($connection, $query);
        
            if ($query_run) {
                $_SESSION['status'] = "Area has been deleted";
                $_SESSION['status_code'] = "success";
                header('location:area-manage.php');
            } else {
                $_SESSION['status'] = "Area not deleted";
                $_SESSION['status_code'] = "warning";
                header('location:area-manage.php');
            }
        }


        if (isset($_POST['UpdateBtnArea'])) {
            $id = $_POST['id'];
            $area = $_POST['area'];
      
        
            $query = "
                    UPDATE `area` 
                    SET `area-name` = '$area'
                    WHERE `id`='$id'
                    ";
                  /*   "
                    UPDATE users SET ( password_hash, usertype, first_name, email ) 
                    VALUES ($password_hash, $usertype, $first_name, $email) WHERE id = $id;
                    "; */
        
            $query_run = mysqli_query($connection, $query);
        
            if ($query_run) {
                $_SESSION['status'] = "Updating Success";
                $_SESSION['status_code'] = "success";
                header('location:area-manage.php');
            } else {
                $_SESSION['status'] = "Updating User Failed";
                $_SESSION['status_code'] = "error";
                header('location:area-manage.php');
            }
        }


//terminal
if (isset($_POST['registerbtnArea'])) {
    $terminal = $_POST['terminal'];
    $area = $_POST['area'];
    $active = $_POST['active'];

        
            $query = "
            INSERT INTO `terminal` (`terminal_id`,`active`,`area`) VALUES ('$terminal','$active','$area');
            ";
            $query_run = mysqli_query($connection, $query);

            if ($query_run) {
                $_SESSION['status'] = "Adding Succesfully";
                $_SESSION['status_code'] = "success";
                header('location:manageTerminal.php');
            } else {
                $_SESSION['status'] = "Adding Faild";
                $_SESSION['status_code'] = "warning";
                header('location:manageTerminal.php');
            }
        } 

        if (isset($_POST['DeleteBtnTer'])) {
            $id = $_POST['DeleteId'];
        
            $query = "
                    DELETE FROM `terminal` WHERE `id` = '$id'
                    ";
            $query_run = mysqli_query($connection, $query);
        
            if ($query_run) {
                $_SESSION['status'] = "Area has been deleted";
                $_SESSION['status_code'] = "success";
                header('location:manageTerminal.php');
            } else {
                $_SESSION['status'] = "Area not deleted";
                $_SESSION['status_code'] = "warning";
                header('location:manageTerminal.php');
            }
        }

?>
