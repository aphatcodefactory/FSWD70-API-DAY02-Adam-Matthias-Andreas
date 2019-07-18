<?php

header("Content-Type:application/json");
require_once("webservice.php");

if(empty($isbn) && empty($title)){
                        response(200, "car not found", NULL, NULL);
        }
        // If the name and the price aren't empty - id exists - car found
        else{
                        response(200, "car found" , $isbn, $title);
        }

function response($status,$status_message,$isbn,$title){
        
        /*HTTP 1.1 provides a persistent connection 
        that allows multiple requests to be batched 
        or pipelined to an output buffer */
        header("HTTP/1.1 $status $status_message");

        // $response array
        $response['status']=$status;
        $response['status_message']=$status_message;
        $response['isbn']=$isbn;
        $response['title']=$title;

        //Generating JSON from the $response array
        $json_response=json_encode($response);

        // Outputting JSON to the client
        echo $json_response;
}