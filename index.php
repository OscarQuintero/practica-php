<!DOCTYPE html>
<?php
	include('connection.php');
?>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Práctica de PHP</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
	
	<main>
		<h1>Introducción a PHP</h1>	

		<h2>Formulario de Agenda</h2>
		<form id="formulario-agenda" method="POST" action="store.php">
			<label for="titulo">Título</label>
			<input type="text" name="titulo" id="">
			<br/>
			<label for="lugar">Lugar</label>
			<input type="text" name="lugar" id="">
			<br/>
			<label for="fecha">Fecha</label>
			<input type="date" name="fecha" id="">
			<br/>
			<label for="hora-inicio">Hora de Inicio</label>
			<input type="time" name="hora-inicio" id="">
			<br/>
			<label for="hora-fin">Hora de Fin</label>
			<input type="time" name="hora-fin" id="">
			<br/>			
			<input type="checkbox" name="todo-el-dia" value="1" class="check">
			<label for="todo-el-dia" class="check-label">Todo el día</label>
			<br/>
			<label for="notas">Notas</label>
			<textarea name="notas" id="" rows="5" cols="40"></textarea> 
			<br/>
			<label for="repetir">Repetir</label>
			<select name="repetir">
				<option value="0">Nunca</option>
				<option value="1d">Diariamente</option>
				<option value="7d">Semanalmente</option>
			</select>
			<br/>
			<input type="submit" value="Añadir Evento">

		</form>
		<hr/>
		<?php
			
			
			//Consulta
			$sql = "SELECT * FROM Evento";
			$stmnt = $conn->prepare($sql);
			$stmnt->execute();

			$stmnt->setFetchMode(PDO::FETCH_ASSOC);
			
			echo "<table id='agenda'>";
				echo "<tr>";
					echo "<th>ID</th>";
					echo "<th>Titulo</th>";
					echo "<th>Fecha</th>";
					echo "<th>Todo el día</th>";
					echo "<th>Hora Inicio</th>";
					echo "<th>Hora Fin</th>";
					echo "<th>Repetir cada</th>";
				echo "</tr>";			

				foreach ($stmnt->fetchAll() as $evento) {
					echo "<tr>";
						echo "<td>".$evento['ID']."</td>";
						echo "<td>".$evento['titulo']."</td>";
						echo "<td>".$evento['fecha']."</td>";
						echo "<td>".$evento['todo_el_dia']."</td>";
						echo "<td>".$evento['hora_inicio']."</td>";
						echo "<td>".$evento['hora_fin']."</td>";
						echo "<td>".$evento['repetir']."</td>";
					echo "</tr>";
				}
			echo "</table>";
		?>
		
	</main>
</body>
</html>
