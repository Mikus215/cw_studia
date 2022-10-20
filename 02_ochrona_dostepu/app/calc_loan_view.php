<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<meta charset="utf-8" />
<title>Kalkulator</title>
<link rel="stylesheet" href="../style/style.css">
<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/app/security/logout.php" class="pure-button pure-button-active">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">

<form action="<?php print(_APP_URL);?>/app/calc_loan.php" method="post" class="form">
	<div class="form__input-controller">
		<label for="load">Kwota kredytu: </label>
		<input id="load" type="number" name="loan"  class="form__input" require/>
	</div>
	<div class="form__input-controller">
		<label for="payback-period"> Okres spłaty(w miesiącach): </label>
		<input id="payback-period" type="number" name="payback-period"  class="form__input" require/>
	</div>
	<div class="form__input-controller">
		<label for="interes-rate"> Oprocentowanie(w procentach): </label>
		<input id="interes-rate" type="number" name="interes-rate"  class="form__input" require max="20"/>
	</div>
	<button type="submit" class="form__submit-button">Oblicz</button>
</form>	

<?php

if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

<?php if (isset($monthPayment) && isset($totalLoanToPay)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
<?php echo 'Mięsiecznie: '.$monthPayment; ?> <br />
<?php echo 'Suma: '.$totalLoanToPay; ?> <br />
</div>
<?php } ?>

</body>
</html>