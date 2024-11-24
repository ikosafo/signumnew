<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $reference = $_POST['reference'];
    if (!$reference) {
        echo json_encode(['status' => false, 'message' => 'No reference provided']);
        exit;
    }

    $url = "https://api.paystack.co/transaction/verify/" . $reference;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer sk_test_0439f07b293c8c0dc698ac3ddca7e03d835e28ef"
    ]);
    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response, true);

    // Print response for debugging
    echo '<pre>';
    print_r($result);
    echo '</pre>';
    exit;

    if ($result && isset($result['status']) && $result['status'] && isset($result['data'])) {
        $amount = $result['data']['amount'];
        $clientid = $result['data']['metadata']['client_id'] ?? null;

        if ($clientid) {
            echo json_encode([
                'status' => true,
                'message' => 'Payment verified successfully!',
                'amount' => $amount,
                'clientid' => $clientid
            ]);
        } else {
            echo json_encode(['status' => false, 'message' => 'Client ID not found in metadata.']);
        }
    } else {
        echo json_encode(['status' => false, 'message' => 'Payment verification failed.']);
    }
}
