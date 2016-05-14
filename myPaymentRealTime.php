<?php

    /* include CreditCard.php */
    include_once ('lib/au.com.gateway.client.component/CreditCard.php');

    /* include transactionAmount.php */
    include_once ('lib/au.com.gateway.client.component/TransactionAmount.php');

    /* include PaymentRealTimeRequest.php */
    include_once ('lib/au.com.gateway.client.payment/PaymentRealTimeRequest.php');

    /* include PaymentRealTimeResponse.php */
    include_once ('lib/au.com.gateway.client.payment/PaymentRealTimeResponse.php');


    /* This method returns $realtime response */
    function createRealTimeCardPayment($client, $cardHolderName, $cardNumber,$secureId,$expiry, $clientId, $transactionType,
                        $amount, $clientRef, $comment){

        /* credit card object */
        $creditCard = new CreditCard();
        $creditCard->setHolderName($cardHolderName);
        $creditCard->setNumber($cardNumber);
        /* 123 */
        $creditCard->setSecureId($secureId);
        /* 1225 */
        $creditCard->setExpiry($expiry);

        /* realtime request */
        $realTimeRequest = new PaymentRealTimeRequest();
        $realTimeRequest->setClientId($clientId);
        $realTimeRequest->setTransactionType($transactionType);
        $realTimeRequest->setCreditCard($creditCard);
        //$10.10 dollars
        $transactionAmount = new TransactionAmount($amount);
        $realTimeRequest->setTransactionAmount($transactionAmount);
        $realTimeRequest->setClientRef($clientRef);
        $realTimeRequest->setComment($comment);
        $realTimeResponse = $client->getPayment()->realTime($realTimeRequest);

        return $realTimeResponse;
    }

    function createRealTimeTokenPayment($client, $cardNumber, $expiry, $clientId, $transactionType,
                                        $amount, $clientRef, $comment){
        $realTimeRequest = new PaymentRealTimeRequest();
        $creditCard = new CreditCard();
        // TOKEN
        $creditCard->setNumber($cardNumber);
        $creditCard->setExpiry($expiry);
        $realTimeRequest->setClientId($clientId);
        $realTimeRequest->setTransactionType($transactionType);
        $realTimeRequest->setCreditCard($creditCard);
        // $10.10 dollars
        $transactionAmount = new TransactionAmount($amount);
        $realTimeRequest->setTransactionAmount($transactionAmount);
        /* clientref - token ref */
        $realTimeRequest->setClientRef($clientRef);
        $realTimeRequest->setComment($comment);
        $realTimeResponse = $client->getPayment()->realTime($realTimeRequest);

        return $realTimeResponse;
    }