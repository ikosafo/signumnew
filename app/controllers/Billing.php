<?php

class Billing extends Controller
{
    public function callback()
    {

        $trxref = isset($_GET['trxref']) ? $_GET['trxref'] : null;
        $reference = isset($_GET['reference']) ? $_GET['reference'] : null;

        if ($trxref || $reference) {
            // Use the Paystack API to verify the transaction with the reference or trxref
            $transactionData = $this->verifyTransaction($trxref);

            if ($transactionData) {
                // Retrieve the details from the response
                //$email = $transactionData['data']['email'];
                $amount = $transactionData['data']['amount']; 
                $clientid = $transactionData['data']['metadata']['clientid'];

                // Pass the data to your view or do further processing
                $this->view("billing/callback", [
                    'clientid' => $clientid,
                    'amount' => $amount 
                ]);
            } else {
                echo "Error: Unable to verify transaction.";
            }
        } else {
            echo "Error: Transaction reference missing.";
        }
    }

    private function verifyTransaction($trxref)
    {
        // Paystack API secret key (use the live key in production)
        $paystackSecretKey = 'sk_test_0439f07b293c8c0dc698ac3ddca7e03d835e28ef'; // Replace with your actual Paystack secret key

        // Initialize cURL
        $ch = curl_init();

        // Set the Paystack API endpoint for verifying a transaction
        $url = "https://api.paystack.co/transaction/verify/{$trxref}";

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer {$paystackSecretKey}",
            "Cache-Control: no-cache"
        ]);

        // Disable SSL verification for local development
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

        // Execute the request
        $response = curl_exec($ch);

        // Check for errors
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
            curl_close($ch);
            return false;
        }

        // Close cURL
        curl_close($ch);

        // Decode the response
        $result = json_decode($response, true);

        // Check if the response is successful and contains the transaction data
        if (isset($result['status']) && $result['status'] === true) {
            return $result;
        }

        return false;
    }
}
