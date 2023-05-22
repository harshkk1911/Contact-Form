<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Get the form data
  $name = $_POST["name"];
  $email = $_POST["email"];
  $message = $_POST["message"];
  $captcha = $_POST["captcha"];

  // Verify the captcha response
  $url = "https://www.google.com/recaptcha/api/siteverify";
  $data = [
    "secret" => "6LeIxAcTAAAAAGG-vFI1TnRWxMZNFuojJ4WifJWe",
    "response" => $captcha,
    "remoteip" => $_SERVER["REMOTE_ADDR"]
  ];

  $options = [
    "http" => [
      "header" => "Content-type: application/x-www-form-urlencoded\r\n",
      "method" => "POST",
      "content" => http_build_query($data)
    ]
  ];

  $context = stream_context_create($options);
  $response = file_get_contents($url, false, $context);
  $result = json_decode($response, true);

  if ($result["success"]) {
    // Captcha verification successful, process the form submission
    // Send email, save to database, etc.

    // Example: Sending an email
    $to = "harshkk1911@gmail.com";
    $subject = "New contact form submission";
    $message = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    mail($to, $subject, $message, $headers);

    // Redirect or display success message
    echo "Thank you for your submission!";
  } else {
    // Captcha verification failed, handle the error
    echo "Captcha verification failed. Please try again.";
  }
}
?>

