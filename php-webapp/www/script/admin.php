<?php
@ob_end_clean();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_SERVER['HTTP_REFERER'])){
        // redirect them to your desired location
        header('location:../index.html');
        exit;
}

session_start();
include "private/dbconnection.inc.php";
include "dbCon.php";

include("header.php");
echo("<section class='u-align-center u-clearfix u-image u-shading u-section-1' data-image-width='3362' data-image-height='2177' id='sec-f76f'>
<div class='u-clearfix u-sheet u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1'>
        <h1 class='u-text u-text-default u-title u-text-1'>Hallo admin</h1>
</div>
<div class='userConsol'>
        <table id='' class='table table-striped table-bordered'>
                <tr>
                        <th>id</th>
                        <th>timestamp</th>
                        <th>fullname</th>
                        <th>username</th>
                        <th>email</th>
                        <th>telpNummer</th>	
                        <th>password</th>
                </tr>
                <tbody>");
        // Fetch records from database 
        $result = $conn->query("SELECT * FROM demo"); 
        if($result->num_rows > 0){ 
                while($row = $result->fetch_assoc()){ 
                        echo ("<tr>");
                                echo ("<td>".$row['id']."</td>");
                                echo ("<td>".$row['timestamp']."</td>");
                                echo ("<td>".$row['fullname']."</td>");
                                echo ("<td>".$row['username']."</td>");
                                echo ("<td>".$row['email']."</td>");
                                echo ("<td>".$row['telpNummer']."</td>");
                                echo ("<td>".$row['password']."</td>");
                        echo ("</tr>");
                }
        };
        echo("
                </tbody>
        </table>
        <a class='btn exportBtn' href='exportCsv.php'>Export CSV</a>
</div>
</section>");


include("footer.php");