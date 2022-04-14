<?php
 
if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');
$api = $_GET["api"];
if ($api <> 'WMKPVTPS86IKBNCJ')
    die("api incorrecta");

	$dbfile = "indicadoresDB.php";
	//$path = "/var/www/html/cmi";
	require_once('../../includes/common.php');
	//require_once('../../../includes/PHPExcel.php');


    
            try
            {
            //$sql = "select tr_fecha, tr_tipo_transaccion, tr_moneda,tr_monto,tr_monto_uf,tr_descripcion from transacciones where tr_cc_id = '{$tr_cc_id}' order by tr_fecha;";
            $sql = "call proc_display_securities_365();";
		//	echo $sql;
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $data = $stmt->fetchAll();
	    $stmt->closeCursor();
            }
            catch(PDOException $ex)
            {
               die("Failed to run query: " . $ex->getMessage());
            }
        

echo "<table>";
echo "<tr><td>ticker</td><td>date</td><td>open</td><td>high</td><td>low</td><td>close</td><td>close</td><td>volume</td><td>dividend_amount</td><td>split_coefficient</td></tr>";
foreach ($data as $row) {
    echo "<tr><td>".$row['ticker']."</td><td>".$row['date']."</td><td>".$row['open']."</td><td>".$row['high']."</td><td>".$row['low']."</td><td>".$row['close']."</td><td>".$row['close']."</td><td>".$row['volume']."</td><td>0</td><td>0</td></tr>";
	$rowCount++;
}
echo "</table>"


?>
 