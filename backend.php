<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');
    $json_data = file_get_contents('php://input');
    $data = json_decode($json_data, true);

    $dressTextarea = $data['dress_list'];
    $layout = $data['layout'];
    $sorting = $data['sorting'];
    $numbering = $data['numbering'];

    // // Echo the data
    $dressTextarea = explode(',', $dressTextarea);
    $dressTextarea = [26, 27, 28, 29, 30];
    // https://abcd2.projectabcd.com/images/dress_images/Slide50.PNG
    // https://abcd2.projectabcd.com/api/getinfo.php?id=50
    $url = 'https://abcd2.projectabcd.com/api/getinfo.php?id=';
    foreach ($dressTextarea as $dressNumber) {
        $req = $url.$dressNumber;
        echo("request".$req);
        $response = file_get_contents($req);
        if ($response !== false) {
            $responseData = json_decode($response, true);
            // $responseCode = $responseData['response_code'];
            // $message = $responseData['message'];
            // $data = $responseData['data'];

            echo("responseCode".$responseData);
      
        }
        // $dressNumber contains the current dress number
        // Perform your action for each dress number here


    }
    // echo "layout: $layout";
    // echo "sorting: $sorting";
    // echo "numbering: $numbering";
 
    $response = array(
        "message" => "This is a POST request response.",
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

function sort_by_name() {
    // Function code here
    // You can use $param1, $param2, etc., as arguments
    // Do something with the arguments
    return True; // You can return a value, if needed
}
function sort_by_id() {
    // Function code here
    // You can use $param1, $param2, etc., as arguments
    // Do something with the arguments
    return True; // You can return a value, if needed
}
// function sort_by_order() {
//     // Function code here
//     // You can use $param1, $param2, etc., as arguments
//     // Do something with the arguments
//     return True; // You can return a value, if needed
// }
?>