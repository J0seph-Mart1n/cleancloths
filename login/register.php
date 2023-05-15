<?php

session_start();
if(isset($_POST['submit'])){

    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "login";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    if(mysqli_connect_error()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    } 

    
    
    $name=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password'];
    $query="INSERT INTO `user` (`id`, `username`, `password`, `created_at`) VALUES ('1', '$name', '$pass', current_timestamp());";
    $select = " SELECT * FROM user WHERE username = '$name' && password = '$pass' ";

    $result = mysqli_query($con, $select);




    if(mysqli_num_rows($result) > 0){

      $error []= 'user already exist!';
      


    }else{

     
        
           mysqli_query($con,$query);
           
           
            header( "refresh:0;url=index.html" ); 
            echo '<script type ="text/JavaScript">';  
            echo 'alert("Thank you for registering. You can login now")';  
            echo '</script>'; 
            //echo 'You have successfully registered.';
    
    }
}




    if(isset($error)){
        foreach($error as $error){
                echo '<span class="error-msg">'.$error.'</span>';
         };
     };


?>