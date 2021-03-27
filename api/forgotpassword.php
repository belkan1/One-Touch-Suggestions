<?php
$return_arr = array();
$email = $_POST['email'];
include "../includes/conn.php";

$sql = "SELECT * FROM users where email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $userid= $row['id'];
    $to = $row['email'];
    $subject = 'Forgot Password';
    $from = 'info@fyp.com';
     
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
     
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
        'Reply-To: '.$from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
     
    // Compose a simple HTML email message
    $message = '<html><body>';
    $message .= '<h1 style="">Click On this button to reset your password</h1>';
    $message .= '<form method="post" action="http://alixaidi.com/FYP/api/resetpassword.php"><input type="hidden" name="userid" value="'. $userid.'" ><input type="submit" name="forgotsubmit" value="Reset Password" style="background-color: #5cb85c; color:white; padding: 10px;" ></form>';
    $message .= '</body></html>';
     
    // Sending email
    if(mail($to, $subject, $message, $headers)){
         $row_array['response'] = "yes";
    } else{
        $row_array['response'] = "no";
    }
}else{
    $row_array['response'] = "Email Not Exist!";
}
 array_push($return_arr,$row_array);
 echo json_encode($return_arr);
?>