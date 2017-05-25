<?php

defined('BASEPATH') OR exit('No direct script access allowed');

?>

<!DOCTYPE html "-//w3c//dtd xhtml 1.0 transitional //en" "http://www.w3.org/tr/xhtml1/dtd/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<!--[if gte mso 9]><xml>
		 <o:OfficeDocumentSettings>
		  <o:AllowPNG/>
		  <o:PixelsPerInch>96</o:PixelsPerInch>
		 </o:OfficeDocumentSettings>
		</xml><![endif]-->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE">
		<title>Nautica Lieto - Mail contatto</title>
	</head>
	<body style="width: 100% !important;min-width: 100%;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100% !important;margin: 0;padding: 0;background-color: #FFFFFF">
		<p>Hai ricevuto una richiesta preventivo. Di seguito i dettagli:</p>
		<table>
			<tr>
				<th style="text-align:right">Nome</th>
				<td><?php echo $nome ?></td>
			</tr>
			<tr>
				<th style="text-align:right">Cognome</th>
				<td><?php echo $cognome ?></td>
			</tr>
			<tr>
				<th style="text-align:right">Email</th>
				<td><?php echo $email ?></td>
			</tr>
			<tr>
				<th style="text-align:right">Telefono</th>
				<td><?php echo $telefono ?></td>
			</tr>
			<tr>
				<th style="text-align:right">Indirizzo</th>
				<td><?php echo $indirizzo ?></td>
			</tr>
			<tr>
				<th style="text-align:right">Città</th>
				<td><?php echo $citta ?></td>
			</tr>
			<tr>
				<th style="text-align:right">Provincia</th>
				<td><?php echo $provincia ?></td>
			</tr>
			<tr>
				<th style="text-align:right">CAP</th>
				<td><?php echo $cap ?></td>
			</tr>
			<tr>
				<th style="text-align:right;vertical-align:top">Richiesta</th>
				<td><?php echo $richiesta ?></td>
			</tr>
			<tr>
				<th style="text-align:right">Iscrivi alla newsletter</th>
				<td><?php echo isset($newsletter) ? "SI" : "NO" ?></td>
			</tr>
		</table>
		<p>Data di invio: <?php echo date("d-m-Y H:i:s",now()) ?></p>

	</body>
</html>
	
