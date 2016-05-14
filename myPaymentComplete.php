<?php

    /* include PaymentCompleteRequest.php */
    include_once ('lib/au.com.gateway.client.payment/PaymentInitRequest.php');

    /* include PaymentCompleteResponse.php */
    include_once ('lib/au.com.gateway.client.payment/PaymentCompleteResponse.php');

    /* include PaymentInitResponse.php */
    include_once('lib/au.com.gateway.client.payment/PaymentInitResponse.php');

    /* This method returns the payment complete response */
    function completePayment($client, $clientId, $initResponse){
        $completeRequest = new PaymentCompleteRequest();
        $completeRequest->setClientId($clientId);
        $completeRequest->setReqid($initResponse->getReqid());
        $completeResponse = $client->getPayment()->complete($completeRequest);
        return $completeResponse;
    }