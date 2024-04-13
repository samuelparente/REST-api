<?php
// ** Developed by Samuel Parente
// ** For testing purposes only
// ** Just for handling curl requests to avoid repeating code everywhere

// Function to send HTTP requests using cURL
function sendRequest($url, $method = 'GET', $data = [])
{
    $ch = curl_init(); // Initialize cURL session

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, $url); // Set the URL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the transfer as a string

    // Set the request method
    switch ($method){

        case 'GET':
            curl_setopt($ch, CURLOPT_HTTPGET, true); // Set as GET request
            break;

        case 'POST':
            curl_setopt($ch, CURLOPT_POST, true); // Set as POST request
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data)); // Set POST data
            break;

        case 'PUT':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT'); // Set as PUT request
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // Set PUT data
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); // Set header for JSON data
            break;
        
        case 'DELETE':
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE'); // Set as DELETE request
            break;
    }
    
    // Execute cURL request
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Get HTTP status code
    curl_close($ch); // Close cURL session

    // Return response and HTTP status code as JSON
    return json_encode(['response' => $response, 'http_code' => $httpCode]);
}
?>
