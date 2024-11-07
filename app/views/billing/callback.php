<?php
// Include your tools or functions to interact with the database or session
// require_once 'Tools.php'; // For example, if you have a Tools class to manage your app logic.

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // Paystack will send a GET request to your callback URL with a reference
    $reference = isset($_GET['reference']) ? htmlspecialchars($_GET['reference']) : null;

    if (empty($reference)) {
        die('Error: Missing reference.');
    }

    // Verify the payment by making a request to Paystack's API
    $url = "https://api.paystack.co/transaction/verify/{$reference}";

    // Initialize cURL
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer sk_test_0439f07b293c8c0dc698ac3ddca7e03d835e28ef", // Your Paystack secret key
    ]);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); // Disable SSL verification (for development/testing)
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); // Disable SSL host verification (for development/testing)

    $result = curl_exec($ch);
    curl_close($ch);

    if ($result === false) {
        die('Error: Unable to connect to Paystack.');
    }

    $response = json_decode($result, true);

    if (isset($response['status']) && $response['status'] == 'success') {
        // Check the transaction status
        if ($response['data']['status'] == 'success') {
            // Payment was successful, update your database, log the transaction, etc.
            $transactionData = $response['data'];
            $amountPaid = $transactionData['amount'];
            $clientid = $transactionData['metadata']['clientid'];

            // Example of updating the database or session
            // Tools::updatePaymentStatus($clientid, $amountPaid, 'paid'); // Update the payment status
            echo "<h1>Payment Successful</h1>";
            echo "<p>Thank you for your payment. Your payment of GHC " . number_format($amountPaid, 2) . " has been received.</p>";
        } else {
            // Payment failed, show an error message
            echo "<h1>Payment Failed</h1>";
            echo "<p>We encountered an issue while processing your payment. Please try again later.</p>";
        }
    } else {
        // Handle Paystack API error response
        echo "<h1>Error</h1>";
        echo "<p>There was an issue with verifying your payment. Please contact support.</p>";
    }
} else {
    // If the request method isn't GET, it's invalid for this callback.
    echo "Invalid request method.";
}
?>
