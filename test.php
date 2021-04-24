<?php
require_once "Forex.php";

$forex = new Forex('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');
echo "1 USD = ".$forex->convert('USD', 'IDR')." IDR ";


?>
