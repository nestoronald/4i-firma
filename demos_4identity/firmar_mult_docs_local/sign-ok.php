<?php
if (!empty($_FILES["attach"])) { 
	$myFile = $_FILES["attach"];
	if ($myFile["error"] !== UPLOAD_ERR_OK) {
		echo "<p>Ha ocurrido un error en la subida del fichero.</p>";
		exit;
	}
	$name = preg_replace("/[^A-Z0-9._-]/i","_", $myFile["name"]);
	$parts = pathinfo($name);
	$name = $parts["filename"]."-".$_POST["documentID"].".".$parts["extension"];
	$success = move_uploaded_file($myFile["tmp_name"],$name);
	if (!$success) {
		echo "<p>No puede guardar el archivo.</p>";
		exit;
	}
	header("Location: sign-end-ok.php?file=".$name);
	exit();
} 
else {
	header("Location: sign-end-error.php");
exit();
}

?>