<?php
// MODIFICAR SEGÚN CONFIGURACIÓN DE LA BASE DE DATOS
$user = "usuario";
$password = "contrasenya";
$database = "webpage01";
$table = "visits";

    try {

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {

           $direccion_ip = $_SERVER['HTTP_CLIENT_IP'];

        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {

           $direccion_ip = $_SERVER['HTTP_X_FORWARDED_FOR'];

        } else {

           $direccion_ip = $_SERVER['REMOTE_ADDR'];
        }

	$totalVisits = 0;

	$db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);

	$sql = "SELECT ip, numero FROM visits WHERE ip = :ip";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':ip', $direccion_ip);
	$rs = $stmt->execute();
	$row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($row) {
               	$totalVisits = $row[0]['numero'] + 1;
		$sql = "UPDATE visits SET numero=:numero WHERE ip=:ip";
       	} else {
		$totalVisits = 1;
		$sql = "INSERT INTO visits (ip, numero) VALUES (:ip, :numero)";
       	}
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':ip', $direccion_ip);
	$stmt->bindParam(':numero', $totalVisits);
	$stmt->execute();
        echo "Welcome, you've visited this page " .  $totalVisits . " times\n";

    } catch (Exception $e) {
        echo $e->getMessage();
    }
?>
