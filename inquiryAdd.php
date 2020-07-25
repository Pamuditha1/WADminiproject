<?php 

if (isset($_POST['submit'])) {       
            
    $name = $_POST["name"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $msg = $_POST["msg"];  

    $date = date("d M Y");

    date_default_timezone_set("Asia/Colombo");
    $time = date("h:i:s A");

    $server = 'localhost:3308';
    $user = 'root';
    $pass = '';
    $db = 'wad_app';    


    $conn = new mysqli( $server,$user , $pass,$db) ;
    $sql = "INSERT INTO inquires (date,time,customerName,email,contactNum,message) 
    VALUES ('$date','$time','$name','$email','$tel','$msg')" ;        

    
    if(mysqli_query($conn, $sql)){
        echo '<script>
            alert("Your message successfully submitted");
        </script>';

        echo '<script>         
            window.location.replace("ContactUs.html");
        </script>';              


    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
        exit();
    }
}
?>