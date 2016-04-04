<?php
 
require_once 'include/DB_Functions.php';
$db = new DB_Functions();
 
// json response array
$response = array("error" => FALSE);
 
if (isset($_POST['username']) && isset($_POST['id']) && isset($_POST['password'])&& isset($_POST['type'])) {
 
    // receiving the post params
    $username = $_POST['username'];
    $id = $_POST['id'];
    $password = $_POST['password'];
	$type = $_POST['type'];
 
    // check if user is already existed with the same username
    if ($db->doesUserExist($username)) {
        // user already existed
        $response["error"] = TRUE;
        $response["error_msg"] = "User already existed with " . $username;
        echo json_encode($response);
    } else {
        // create a new user
        switch ($type) {
        	case 'COMP':
        		  $user = $db->storeCompanies($username, $id, $password,$type,$NAME,$ADDR,$HR_NAME,$HR_EMAIL,$HR_PHONE,$VERIFIED,$TENDERS_FLOATED,$JOBS_FLOATED,$SUB_TYPE) {
 ;
        		break;
        	case 'CONT':
        		  $user = $db->storeContractor($username, $id, $password,$type,$NAME,$ADDR,$HR_NAME,$HR_EMAIL,$HR_PHONE,$VERIFIED,$TENDERS_RESPONDED,$JOBS_FLOATED,$SUB_TYPE));
        		break;        	
        	case 'APPL':
        	      $user = $db->storeApplicant($username, $id, $password,$type,$NAME,$PWD,$DOB,$EMAIL,$ADDR,$PHONE,$RELIGION,$CASTE,$M_STATUS,$CODE,$SUB_TYPE);
        		break;
        }
        if ($user) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["user"]["id"] = $user["ID"];
            $response["user"]["name"] = $user["USERNAME"];
            $response["user"]["TYPE"] = $user["TYPE"];
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
} else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters (username, id, password or level) is missing!";
    echo json_encode($response);
}
?>