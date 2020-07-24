<?php 
                
    session_start();

    unset($_SESSION["uname"]);
    unset($_SESSION["pswrd"]);
    echo "<script>window.close();</script>";
                 
?>