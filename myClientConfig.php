<?php

    /* include  client config */
    include_once ('lib/au.com.gateway.client.config/ClientConfig.php');

    /* This method takes three params and instantiate the config client */
    function createConfig($ServiceEndpoint,$AuthToken,$HmacSecret){
        $clientConfig = new ClientConfig();
        $clientConfig->setServiceEndpoint($ServiceEndpoint);
        $clientConfig->setAuthToken($AuthToken);
        $clientConfig->setHmacSecret($HmacSecret);
        return $clientConfig;
    }

