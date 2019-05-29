<?php 

session_start();

    include('../dbConfig.php');
    $mysqli_conn = new Connection();
    $mysqli_conn->connect();
    
    if(isset($_POST['submit'])){

        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $get_username=mysqli_real_escape_string($mysqli_conn->conn,$_POST['username']);
            $get_password=mysqli_real_escape_string($mysqli_conn->conn,$_POST['password']);
            $sql="SELECT * FROM admin_user WHERE username= '$get_username' AND password = '$get_password' ";

            if($result=$mysqli_conn->get($sql)){

                if($result->num_rows == 1){

                    $_SESSION['admin']=$get_username;
                    
                    header('Location:../admin');
                }else{
                    header('Location:login.php?adffe=wrong');
                }               
            }else{
                header('Location:login.php?adffe=error');
            }               
        }else{
            header('Location:login.php?adffe=empty');
            }       
    }

?>