<?php
	include('connection.php');


	//Asignaciones y declaraciones
	
	if (!empty($_POST['titulo'])) {
		$titulo = $_POST['titulo'];
		$lugar = $_POST['lugar'];
		$fecha = $_POST['fecha'];
		$horaInicio = $_POST['hora-inicio'];
		$horaFin = $_POST['hora-fin'];
		$todoElDia = $_POST['todo-el-dia'];
		$notas = $_POST['notas'];
		$repetir = $_POST['repetir'];

		//Inserción
		$sql = "INSERT INTO Evento(titulo, lugar, fecha, hora_inicio, hora_fin, todo_el_dia, notas, repetir) VALUES('$titulo','$lugar', '$fecha','$horaInicio','$horaFin','$todoElDia','$notas','$repetir')";
		$conn->exec($sql);

		header('Location: index.php');
	}else{
		echo "No hay datos";
	}

?>
