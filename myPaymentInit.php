<?php

    /* include PaymentInitRequest.php */
    include_once ('lib/au.com.gateway.client.payment/PaymentInitRequest.php');

    /* include PaymentInitResponse.php */
    include_once ('lib/au.com.gateway.client.payment/PaymentInitResponse.php');

    /* include transactionAmount.php */
    include_once ('lib/au.com.gateway.client.component/TransactionAmount.php');

    /* include Redirect.php */
    include_once ('lib/au.com.gateway.client.component/Redirect.php');

    /* include TransactionType.php */
    include_once ('lib/au.com.gateway.client.enums/TransactionType.php');


    /* This method returns initResponse for purchase request and token request */
    /* TransactionType::$PURCHASE, TransactionType::$TOKEN,  */
    function createPaymentRequest($client,$clientId,$transactionType,$amount,$clientRef,$comment,$redirectUrl){
        $initRequest = new PaymentInitRequest();
        $initRequest->setClientId($clientId);
        $initRequest->setTransactionType($transactionType);
        // $10.10 dollars
        $transactionAmount = new TransactionAmount($amount);
        $initRequest->setTransactionAmount($transactionAmount);
        $initRequest->setClientRef($clientRef);
        $initRequest->setComment($comment);
        $redirect = new Redirect($redirectUrl);
        $initRequest->setRedirect($redirect);
        /* reqId, expireAt, paymentPageUrl */
        $initResponse = $client->getPayment()->init($initRequest);
        return $initResponse;
    }

    /* This method returns  */
    function createTokenizeRequest($client,$clientId,$transactionType,$amount,$clientRef,$redirectUrl,$tokenRef,$paymentInitRequest){

        $initRequest = new PaymentInitRequest();
        $initRequest->setClientId($clientId);
        /* TransactionType::$PURCHASE  */
        $initRequest->setTransactionType($transactionType);
         // $10.10 dollars
        $transactionAmount = new TransactionAmount($amount);
        $initRequest->setTransactionAmount($transactionAmount);
        $initRequest->setClientRef($clientRef);
        $redirect = new Redirect($redirectUrl);
        $initRequest->setRedirect($redirect);
        $initRequest->setTokenize(TRUE);
        $initRequest->setTokenReference($tokenRef);
        $initRequest = $client->getPayment()->init($paymentInitRequest);
        /* reqId, expireAt, paymentPageUrl */
        $initResponse = $client->getPayment()->init($initRequest);
        return $initResponse;
    }