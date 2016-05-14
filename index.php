<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <title>Home</title>
      <link rel="stylesheet" href="css/bootstrap.css" media="screen">
      <link rel="stylesheet" href="css/bootswatch.min.css">
      <link rel="stylesheet" href="css/jsonprettyprint.css">
      <script src="js/jquery-1.10.2.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/bootswatch.js"></script>
   </head>
   <body>
      <form action="payment_init.php" method="post" id="submitform">
         <table class="table table-condensed" style="" >
            <tr>
               <td><b>Credit Type<span style="color: red">*</span></b></td>
               <td><select class="input-sm">
				  <option class="input-sm" value="VISA">VISA</option>
				  <option class="input-sm" value="MASTERCARD">MASTER CARD</option>
				  <option class="input-sm" value="AMEX">AMEX</option>
				  <option class="input-sm" value="DINERS">DINERS</option>
				  <option class="input-sm" value="UNIONPAY">UNIONPAY</option>
				</select>
               </td>

            </tr>
            <tr>
               <td><b>Payment Amount<span style="color: red">*</span></b></td>
               <td><input type="text"name="paymentAmount" class="input-sm" value="0"/></td>
            </tr>
            <tr>
               <td><b>Currency Type<span style="color: red">*</span></b></td>
               <td>
           		<select name="currencyType" class="input-sm">
				  <option class="input-sm" value="USD">USD</option>
				  <option class="input-sm" value="LKR">LKR</option>
				  <option class="input-sm" value="AUD">NZD</option>
				</select>
               </td>
            </tr>
            <tr>
               <td><b></b></td>
               <td><input type="submit" name="submit" class="btn btn-primary " value="Submit" />  </td>
            </tr>
         </table>
      </form>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/bootswatch.js"></script>
   </body>
</html>