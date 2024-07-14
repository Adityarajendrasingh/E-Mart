<?php
require('config.php');
session_start();
?>
<form action="submit.php" method="post">
	<script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		data-key="<?php echo $publishableKey?>"
		data-amount="<?php echo $_SESSION['total_amt']*100;?>"
		data-name="Emart"
		data-description="Card Payment"
		data-image="https://www.logostack.com/wp-content/uploads/designers/eclipse42/small-panda-01-600x420.jpg"
		data-currency="inr"
		data-email="<?php echo $_SESSION['Uemail'];?>"
	>
	</script>
	<input type="radio" id="payment" name="payment" value="Credit/Debit/ATM Card" required checked ><input type="submit">Pay with Card</input>

</form>
