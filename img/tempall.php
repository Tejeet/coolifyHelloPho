<?php
include("dbconfig.php");

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


//Creating Array for JSON response
$response = array();

// Fire SQL query to get all data from weather
$result = mysqli_query($con, "SELECT * FROM hardwareDevices, filesdata,otherrequests WHERE hardwareDevices.id = ( SELECT max(id) from hardwareDevices) AND filesdata.id = ( SELECT max(id) from filesdata) AND otherrequests.id = ( SELECT max(id) from otherrequests)") or die(mysqli_error());

if (mysqli_num_rows($result) > 0) {

    $rowa = mysqli_fetch_assoc($result);

    $response["success"] = 1;
    $response["field1"] = $rowa['analog1'];
    $response["field2"] = $rowa['analog2'];
    $response["field3"] = $rowa['relay1'];
    $response["filepath"] = $rowa['filepath'];
    $response["failedrequestdata"] = $rowa['requests'];
    $response["updatedon1"] = $rowa['updatedon'];
    $response["updatedon2"] = $rowa['uploadtime'];

    // Show JSON response
    echo json_encode($response);
} else {
    // If no data is found
    $response["success"] = 0;
    $response["message"] = "No data found";

    // Show JSON response
    echo json_encode($response);
}
?>