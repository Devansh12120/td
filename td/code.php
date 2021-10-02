<?php 
session_start();

$connection = new mysqli("localhost","root","","td");
if (! $connection){
    die("Error in connection".$connection->connect_error);
}

if (isset($_POST['newsletter_btn'])) {
    $email = $_POST['email'];
    // echo $email;
        $query = "INSERT INTO newsletter (email) VALUES ('$email')";
        $query_run = mysqli_query($connection,$query);
        if($query_run)
        {
            // echo "Saved";
            $_SESSION['status'] = "You are SUBSCRIBED";
            $_SESSION['status'] = "success";
            header('Location: index.php');
        }
        else 
        {
            $_SESSION['status'] = "You are NOT SUBSCRIBED";
            $_SESSION['status_code'] = "error";
            header('Location: index.php');  
        }
}
if (isset($_POST['signup_btn'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $email_query = "SELECT * FROM users WHERE email='$email' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "Email Already Taken. Please Try Another one.";
        $_SESSION['status_code'] = "error";
        header('Location: login.php');  
    }
    else
    {
        if (strlen($mobile)==10) {
            if($password === $cpassword){
                $query = "INSERT INTO users (fname, lname, email, mobile, password) VALUES 
                ('$fname', '$lname', '$email', '$mobile', '$password')";
                $query_run = mysqli_query($connection,$query);
                if($query_run)
                {
                    $_SESSION['status'] = "Your account has been created successfully !!";
                    $_SESSION['status_code'] = "success";
                    header('Location: login.php');
                }
                else 
                {
                    $_SESSION['status'] = "Try after some time";
                    $_SESSION['status_code'] = "error";
                    header('Location: login.php');  
                }
            }
            else{
                    $_SESSION['status'] = "Password mismatch error";
                    $_SESSION['status_code'] = "error";
                    header('Location: login.php');  
            }
        }
        else{
            $_SESSION['status'] = "Enter correct contacr number";
            $_SESSION['status_code'] = "error";
            header('Location: login.php');  
    }

    }
}



if (isset($_POST['login_btn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $email_query = "SELECT * FROM users WHERE email='$email' AND password = '$password' ";
    $email_query_run = mysqli_query($connection, $email_query);
    if(mysqli_num_rows($email_query_run) == 1)
    {
        $_SESSION['contact_status'] = "Login Successful";
        $_SESSION['status_code'] = "success";
        header('Location: index.php');  
    }
    else{
        $_SESSION['contact_status'] = "Login Un-Successful";
        $_SESSION['status_code'] = "error";
        header('Location: login.php');  
    }


    
}

if (isset($_POST['contact_btn'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
                $query = "INSERT INTO contact (name, email, mobile, subject, message) VALUES 
                ('$fname', '$email', '$mobile', '$subject', '$message')";
                $query_run = mysqli_query($connection,$query);
                if($query_run)
                {
                    $_SESSION['contact_status'] = "Our team will connect you soon !!";
                    $_SESSION['status_code'] = "success";
                    header('Location: contact.php');
                }
                else 
                {
                    $_SESSION['contact_status'] = "Try after some time";
                    $_SESSION['status_code'] = "error";
                    header('Location: contact.php');  
                }
            

    
}
?>
