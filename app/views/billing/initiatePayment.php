<?php
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve POST data and sanitize
    $clientid = isset($_POST['clientid']) ? htmlspecialchars($_POST['clientid']) : null;
    $amount = isset($_POST['amount']) ? htmlspecialchars($_POST['amount']) : null;

    if (empty($clientid) || empty($amount)) {
        die("Error: Client ID or amount is missing.");
    }

    $clientEmail = Tools::clientEmail($clientid);
    if (empty($clientEmail)) {
        die("Error: Client email not found.");
    }

    // Prepare the Paystack API request
    $url = "https://api.paystack.co/transaction/initialize";
    $fields = [
        'email' => $clientEmail,
        'amount' => $amount,
        'callback_url' => URLROOT."/billing/callback",
        'metadata' => [
            'clientid' => $clientid // Optional metadata for tracking
        ]
    ];
    
    $fields_string = http_build_query($fields);

    // Initialize cURL
    $ch = curl_init();
    
    // Set the URL, number of POST vars, POST data
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Authorization: Bearer sk_test_0439f07b293c8c0dc698ac3ddca7e03d835e28ef", // Replace with your Paystack secret key
        "Cache-Control: no-cache",
    ));
    
    // To return the cURL response rather than outputting it
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);  // Disable SSL verification (only for development/testing)
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);  // Disable SSL host verification (only for development/testing)
    curl_setopt($ch, CURLOPT_TIMEOUT, 20);         // Timeout in seconds

    // Execute the cURL request and get the response
    $result = curl_exec($ch);
    
    // Check for cURL errors
    if ($result === false) {
        echo 'cURL error: ' . curl_error($ch);
        curl_close($ch);
        exit;
    }
    
    curl_close($ch);

    // Decode the response
    $response = json_decode($result, true);

    // Check if the response contains the expected data
    if (isset($response['status']) && $response['status']) {
        // Return the Paystack authorization URL to the frontend
        echo json_encode(['authorization_url' => $response['data']['authorization_url']]);
        exit;
    } else {
        // Return error message
        echo json_encode(['error' => 'Payment initialization failed: ' . (isset($response['message']) ? $response['message'] : 'Unknown error')]);
    }
}
?>
