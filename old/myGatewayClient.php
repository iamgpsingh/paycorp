<?php

    /* include gateway client */
    include_once ('lib/au.com.gateway.client/GatewayClient.php');

    /* This method create gatewayClient and takes clientConfig as param */
    function createGatewayClient($clientConfig){
        $gatewayClient = new GatewayClient($clientConfig);
        return $gatewayClient;
    }