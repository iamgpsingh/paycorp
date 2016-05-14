<?php

    /* include myClientConfig.php */
    include_once "myClientConfig.php";

    /* include myGatewayClient.php */
    include_once "myGatewayClient.php";

    /* include BaseFacade.php from au.com.gateway.client.facade */
    include_once "lib/au.com.gateway.client.facade/BaseFacade.php";

    /* include Valt.php from au.com.gateway.client.facade */
    include_once "lib/au.com.gateway.client.facade/Vault.php";

    /* include Report.php from au.com.gateway.client.facade */
    include_once "lib/au.com.gateway.client.facade/Report.php";

    /* include AmexWallet.php from au.com.gateway.client.facade */
    include_once "lib/au.com.gateway.client.facade/AmexWallet.php";

    /* include payment.php from au.com.gateway.client.facade */
    include_once "lib/au.com.gateway.client.facade/Payment.php";

    /* config data */
    $ServiceEndpoint = "https://sampath.paycorp.com.au/rest/service/proxy";
    $AuthToken = "829fd612-2699-4e00-ac89-bb67bfcf3196";
    $HmacSecret = "VkaxwaPgSCCm5sRH";

    /* create config */
    $clientConfig = createConfig($ServiceEndpoint, $AuthToken, $HmacSecret);
    $gatewayClient = createGatewayClient($clientConfig);

    echo 'client Config' . $clientConfig->getAuthToken() . '<br>';




