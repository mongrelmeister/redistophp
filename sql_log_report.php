<!DOCTYPE html>
<html>

  <head>
    <title>Site Visits Report</title>
  </head>

  <body>

      <h1>Site Visits Report</h1>

      <table border = '1'>
        <tr>
          <th>No.</th>
          <th>Visitor</th>
          <th>Total Visits</th>
        </tr>

        <?php

            try {
// CAMBIAR SEGÚN CONFIGURACIÓN DE LA BASE DE DATOS
		$user = "webuser";
		$password = "contrasenya";
		$database = "webpage01";
		$table = "visits";

		$db = new PDO("mysql:host=localhost;dbname=$database", $user, $password);

		$stm = $db->query('SELECT * FROM visits');
		$rows = $stm->fetchAll();

		$i = 1;

                foreach ($rows as $row) {

                    echo "<tr>";
                      echo "<td align = 'left'>"   . $i . "."     . "</td>";
                      echo "<td align = 'left'>"   . $row['ip']     . "</td>";
                      echo "<td align = 'right'>"  . $row['numero'] . "</td>";
                    echo "</tr>";

                    $i++;
                }

            } catch (Exception $e) {
                echo $e->getMessage();
            }

        ?>

      </table>
  </body>

</html>
