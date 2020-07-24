<?php 
    
    $uname = $_REQUEST['uname'];
    $pass = $_REQUEST['pswrd'];

    if ($uname == "admin" && $pass == "ADMIN") {

        session_start();
        $_SESSION["uname"] = $uname;
        $_SESSION["pass"] = $pass;
        header( 'Location: showDatabase.php' );
        
        
    } else {
        echo '
           <h1 style="color:red;text-align:center;"> Invalid Username or Password</h1>
           <script>
                alert("Invalid Username or Password");
                window.close();
           </script>
        ';

    }   

?>