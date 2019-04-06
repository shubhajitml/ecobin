<?php
header('Access-Control-Allow-Origin: *');
include_once('connection.php');

//$response = file_get_contents("php://input");

//print_r($response);

if(isset($_GET['bin_code']) && isset($_GET['is_bin_present']) && isset($_GET['bin_level']))
{
    $bin_code = $_GET['bin_code'];
    $is_bin_present = $_GET['is_bin_present'];
    $latitude = $_GET['latitude'];
    $longitude = $_GET['longitude'];
    $bin_level = $_GET['bin_level'];


    $stmt = $conn->prepare("INSERT INTO bin_sensor_data(`fk_bin_id`, `is_bin_present`, `latitude`, `longitude`, `bin_level`, `created_time`)
    VALUES(:bincode, :isbinpresent, :latitude, :longitude, :binlevel, :creationtime)");
    
    if($stmt->execute(array(
    "bincode" => $bin_code,
    "isbinpresent" => $is_bin_present,
    "latitude" => $latitude,
    "longitude" => $longitude,
    "binlevel" => $bin_level,
    "creationtime" => date('Y-m-d H:i:s'))))
    {
        echo 'Success';
    }
    else
    {
        echo 'NOT Success';
    }
    

}

?>