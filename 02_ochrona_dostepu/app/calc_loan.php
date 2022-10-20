<?php

require_once dirname(__FILE__).'/../config.php';

include _ROOT_PATH.'/app/security/check.php';

$loan = $_REQUEST ['loan'];
$paybackPeriod = $_REQUEST ['payback-period'];
$interesRate = $_REQUEST ['interes-rate'];

if ( ! (is_numeric($loan) && is_numeric($paybackPeriod) && is_numeric($interesRate))) {
	$messages [] = 'Błędne wywołanie aplikacji. Brak jednego z parametrów.';
}

if ( !is_numeric( $loan )  ) {
	$messages [] = 'Nie podano kwoty kredytu';
}
if ( !is_numeric( $paybackPeriod )  ) {
	$messages [] = 'Nie podano okresu spłaty';
}
if ( !is_numeric( $interesRate )  ) {
	$messages [] = 'Nie podano oprocentowania';
}

if (empty ( $messages )) { 
	$monthPayment = round((($loan * ($interesRate / 100)) + $loan) / $paybackPeriod, 4);
	$totalLoanToPay = $monthPayment * $paybackPeriod;
}

include 'calc_loan_view.php';