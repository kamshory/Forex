<?php
require_once "Forex.php";

$forex = new Forex('http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml');

?>
<style>
table{
    border-collapse: collapse;
}
td{
    padding: 4px 8px;
}
</style>
<table border="1" style="">
    <thead>
        <td>From</td>
        <td>To</td>
        </tr>
    </thead>
<tbody>
<?php
foreach($forex->cuurencyRates as $to=>$rate)
{
    ?>
            <tr>
            <td>1 <?php echo $to;?></td>
            <td><?php echo number_format($forex->convert($to, 'IDR'), 2, ".", "");?> IDR</td>
            </tr>
    <?php
}
?>
</tbody>
</table>
<?php



?>
