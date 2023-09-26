<?php

function sortByName($a, $b) {
    return strcmp($a->data->name, $b->data->name);
}
function sortById($a, $b) {
    return strcmp($a->data->id, $b->data->id);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    $dressTextarea = $data['dress_list'];
    $layout = $data['layout'];
    $sorting = $data['sorting'];
    $numbering = $data['numbering'];
    $responseList = [];
    // // Echo the data
    $dressTextarea = explode(',', $dressTextarea);
    // $dressTextarea = [26, 27, 28, 29, 30];
    // https://abcd2.projectabcd.com/images/dress_images/Slide50.PNG
    // https://abcd2.projectabcd.com/api/getinfo.php?id=50
    $url = 'https://abcd2.projectabcd.com/api/getinfo.php?id=';
    foreach ($dressTextarea as $dressNumber) {
        $req = $url.urlencode($dressNumber);
        $options = [
            'http' => [
                'method' => 'GET',
                'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
            ],
        ];
        $context = stream_context_create($options);
        $response = file_get_contents($req, false, $context);
        
        if ($response === false) {
            // Handle the error
            $error_message = error_get_last();
            echo "HTTP request failed: " . $error_message['message'];
        } else {
            $responseData = json_decode($response);
            // $response_type = gettype($responseData);
            // echo("response_code".$responseData->response_code);
            $responseList[] = $responseData;

        }

    }
    if($sorting == "a"){
        usort($responseList, 'sortByName');
    }
    if($sorting == "b"){
        usort($responseList, 'sortById');
    }
   
    // print_r($responseList);
    
   

    $response = array(
        "message" => "This is a POST request response.",
        "data" => $responseList
    );
    http_response_code(200);
    echo json_encode($response);
} else {
    $response = array(
        "message" => "Unsupported HTTP method."
    );
    http_response_code(405);
    echo json_encode($response);
}

// numbering a = Show both Page No and Dress ID
// numbering b = Show Page No
// numbering c = Show Dress ID

function layoutA($data,$numbering) {
    // Function code here
    // You can use $param1, $param2, etc., as arguments
    // Do something with the arguments
    return True; // You can return a value, if needed
}
function layoutB($data,$numbering) {
    // Function code here
    // You can use $param1, $param2, etc., as arguments
    // Do something with the arguments
    return True; // You can return a value, if needed
}
function layoutC($data,$numbering) {
    // Function code here
    // You can use $param1, $param2, etc., as arguments
    // Do something with the arguments
    return True; // You can return a value, if needed
}
?>