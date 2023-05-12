#!/usr/bin/php
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

include "private/dbconnection.inc.php";
include "dbCon.php";
// Fetch records from database 
$query = $conn->query("SELECT * FROM demo");

// Prepare folder for csv data
if(!is_dir("../tempdir")){
        chmod("../tempdir",777);
        mkdir("../tempdir");
      }
      
if(!file_exists("../tempdir/user.csv")){
        touch("../tempdir/user.csv");
      }
if($query->num_rows>0){

        // Create a file
        $file = fopen("php://memory","w");
        $delimiter = ';';
        $filename = 'userDatabase.csv';
        // Set column headers 
        $fields = array('id', 'timestamp', 'fullname', 'username', 'email', 'telpNummer', 'password', 'token'); 
        fputcsv($file,$fields,$delimiter);
        // Output each row of the data, format line as csv and write to file pointer 
        while($row = $query->fetch_assoc()){ 
        $lineData = array($row['id'], $row['timestamp'], $row['fullname'], $row['username'], $row['email'], $row['telpNummer'], $row['password'], $row['token']);
                fputcsv($file,$lineData,$delimiter);
        }
  
    // Move back to beginning of file 
    fseek($file, 0); 
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($file); 
} 
exit; 