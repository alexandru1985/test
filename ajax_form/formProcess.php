<?php

session_start();

function checkValidation($name, $email, $msg_subject, $message) {

    $errorMSG = "";


    /* NAME */
    if (isset($name) && !empty($name)) {
        
        $nameTxt = $name;
    } else {
        $errorMSG = "<li>Name is required</<li>";
    }


    /* EMAIL */
    if (isset($email) && !empty($email)) {
        $emailTxt = $email;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errorMSG .= "<li>Invalid email format</li>";
        }
    } else {
        $errorMSG .= "<li>Email is required</li>";
    }


    /* MSG SUBJECT */
    if (isset($msg_subject)  && !empty($msg_subject)) {
        $subjectTxt = $msg_subject;
    } else {
        $errorMSG .= "<li>Subject is required</li>";
    }


    /* MESSAGE */
    if (isset($message) && !empty($message)) {
        $messageTxt = $message;
    } else {
        $errorMSG .= "<li>Message is required</li>";
    }


    if (empty($errorMSG)) {
        $msg = "Name: " . $nameTxt . ", Email: " . $emailTxt . ", Subject: " . $subjectTxt . ", Message:" . $messageTxt;
        $rowAdded = 1;
        $_SESSION["rowAdded"] = 1;
        return json_encode(['code' => 200, 'msg' => $msg, 'rowAdded' => $rowAdded]);
    }


    return json_encode(['code' => 404, 'msg' => $errorMSG]);
}

echo checkValidation($_POST["name"], $_POST["email"], $_POST["msg_subject"], $_POST["message"]);
?>
