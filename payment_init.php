<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <title>Paycorp Init</title>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/bootswatch.min.css">
    <link rel="stylesheet" href="css/jsonprettyprint.css">
    <link rel="stylesheet" href="../pcw4/css/layout.css">
    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootswatch.js"></script>
</head>
<body>
		<?php
        error_reporting(E_ALL);
        ini_set('display_errors', 0);
        ?>

        <?php include 'lib/au.com.gateway.client/GatewayClient.php'; ?>
        <?php include 'lib/au.com.gateway.client.config/ClientConfig.php'; ?>
        <?php include 'lib/au.com.gateway.client.component/RequestHeader.php'; ?>
        <?php include 'lib/au.com.gateway.client.component/CreditCard.php'; ?>
        <?php include 'lib/au.com.gateway.client.component/TransactionAmount.php'; ?>
        <?php include 'lib/au.com.gateway.client.component/Redirect.php'; ?>
        <?php include 'lib/au.com.gateway.client.facade/BaseFacade.php'; ?>
        <?php include 'lib/au.com.gateway.client.facade/Payment.php'; ?>
        <?php include 'lib/au.com.gateway.client.payment/PaymentInitRequest.php'; ?>
        <?php include 'lib/au.com.gateway.client.payment/PaymentInitResponse.php'; ?>
        <?php include 'lib/au.com.gateway.client.root/PaycorpRequest.php'; ?>
        <?php include 'lib/au.com.gateway.client.utils/IJsonHelper.php'; ?>
        <?php include 'lib/au.com.gateway.client.helpers/PaymentInitJsonHelper.php'; ?>
        <?php include 'lib/au.com.gateway.client.utils/HmacUtils.php'; ?>
        <?php include 'lib/au.com.gateway.client.utils/CommonUtils.php'; ?>
        <?php include 'lib/au.com.gateway.client.utils/RestClient.php'; ?>
        <?php include 'lib/au.com.gateway.client.enums/TransactionType.php'; ?>
        <?php include 'lib/au.com.gateway.client.enums/Version.php'; ?>
        <?php include 'lib/au.com.gateway.client.enums/Operation.php'; ?>
        <?php include 'lib/au.com.gateway.client.facade/Vault.php'; ?>
        <?php include 'lib/au.com.gateway.client.facade/Report.php'; ?>
        <?php include 'lib/au.com.gateway.client.facade/AmexWallet.php'; ?>

</body>
</html>