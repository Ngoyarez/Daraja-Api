<?php
 		header("Content-Type: application/json");

     $response = '{
         "ResultCode": 0, 
         "ResultDesc": "Confirmation Received Successfully"
     }';
 
     // DATA
     $mpesaResponse = file_get_contents('php://input');
 
     // log the response
     $logFile = "M_PESAConfirmationResponse.txt"; //create this file in the folder and you can add a code below to format the Mpesa_Confirmation json response
     
    //  Uncomment This if you want it to work with a database
    //  //Connect to DB
    //  $conn = mysqli_connect("localhost", "root", "", "daraja");

    //  //Check connection
    //  if($conn->connect_error){
    //   die("<h1>Connection Failed: </h1> " . $conn->connect_error);
    //  }else{
    //     $insert = $conn->query("INSERT INTO data(CheckoutRequestID, ResultCode, amount, MpesaReceiptNumber, PhonNumber)");
    //     $conn = null;
    //  }
     
     
     // write to file
     $log = fopen($logFile, "a");
 
     fwrite($log, $mpesaResponse);
     fclose($log);
 
     echo $response;
