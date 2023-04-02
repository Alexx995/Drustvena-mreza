<?php
require_once('db.php');
$konekcija = (new mysqlconnector())->connectToMysql();
session_start();




     // get sender's ID from the session
    $receiver_id = $_POST["recipient_id"]; // get receiver's ID from the form

    $message = $_POST["message"];

    $user_id="SELECT id FROM users WHERE active=1";
    $userid=mysqli_query($konekcija, $user_id);
    $ovono = mysqli_fetch_assoc($userid);
    $loggedId= implode($ovono);

    // insert message into the database
    $sql = "INSERT INTO messages (send_id, get_id, text) VALUES ($loggedId, $receiver_id, '$message')";
    $result = mysqli_query($konekcija, $sql);

    if ($result) {
        echo "Message sent successfully.";
    } else {
        echo "Error sending message: " . mysqli_error($konekcija);
    }

    header("Location: views/chat.html?id=$receiver_id");
?>

