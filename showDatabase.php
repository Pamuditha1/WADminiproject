<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="editedbootstrap.min.css">

    <title>FS | Oders(Admin)</title>
    <link rel="icon" type="image/ico" href="logoT.jpg" />

    <style>
        table{
            margin-top: 50px;
            text-align: center;
        }
        h1{
            text-align: center;
            margin-top: 50px;
            color: #343d46;
            background-color: #c0c5ce;
        }
        h5{
            color: blue;
            margin-left: 50px;
        }
        #msgB{
            top: 20px;
            right: 50px;
            position: absolute;
        }
        #logoutB{
            top: -40px;
            right: 20px;
            position: absolute;
        }
        @media only screen and (max-width: 600px) {
            #msgB{
            top: 50px;
            right: 20px;
            
        }

        }
    </style>
</head>
<body >
    <div class="container-fulid col-12">

        <h1>Oders</h1>        
        <h5 id="date"></h5>
        <h5 id="time"></h5>
        
        <?php 
            session_start();

            if($_SESSION['uname']) {

                echo'
                <a href="logOut.php">
                <button class="btn btn-danger" id="logoutB" >Log Out</button>
                </a>
                ';

                echo'
                <a href="showInquiries.php">
                <button class="btn btn-success" id="msgB" >Check Messages</button>
                </a>
                ';

    // .............................................Connect Database....................................................

                $server = 'localhost:3308';
                $user = 'root';
                $pass = '';
                $db = 'wad_app';
        
                $conn = new mysqli( $server,$user , $pass,$db) ;
        
                $sql = "SELECT*FROM oders" ;
                $result = $conn->query($sql);
    //  .............................   Retrieve Data from Database   .....................................................
                
            echo'
            <div class="table-responsive">
                <table class="table table-hover table-dark col-12">
                    <thead>
                    <tr>
                        <th scope="col">Oder No</th>
                        <th scope="col">Date</th>
                        <th scope="col">Time</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Contact(Mobile)</th>
                        <th scope="col">Contact(Fixed)</th>
                        <th scope="col">Address</th>
                        <th scope="col">Item Code</th>
                        <th scope="col">Size</th>
                        <th scope="col">Quantity</th>
                    </tr>
                    </thead>
                    <tbody> ';
        
                if ($result->num_rows > 0) {
                
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                    echo '
                        <tr>
                            <th scope="row">'. $row["oderID"].'</th>
                            <td>'. $row["date"].'</td>
                            <td>'.$row["time"].'</td>
                            <td>'. $row["name"].'</td>
                            <td>'.$row["mobileNo"].'</td>
                            <td>'. $row["landNo"].'</td>
                            <td>'.$row["address"].'</td>
                            <td>'. $row["itemNo"].'</td>
                            <td>'.$row["size"].'</td>
                            <td>'. $row["quantity"].'</td>       
                            
                        </tr>';  
                
                    }        
                    echo '
                    </tbody>
                </table>
            </div>';
            
                } 
                else {
                echo "0 results";
                }            
                $conn->close();

            }
            else{
                echo '<h1 style="color: red;padding:10px; border:red">You must Log In first</h1>';
            }       
        
        ?>
    </div>
    
    
    <script>        
        var d = new Date();

        var hours = d.getHours();
        var minutes = d.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0'+minutes : minutes;
        var time = hours + ':' + minutes + ' ' + ampm;
        document.getElementById("time").innerHTML= time;

        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var date =d.getDate() +' '+(months[d.getMonth()])+' '+d.getFullYear();

        document.getElementById("date").innerHTML= date;
            
    </script>

</body>
</html>