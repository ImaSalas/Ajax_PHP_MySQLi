<?php 

	$conexion=mysqli_connect('20.25.51.254','server','123456789','newAzure');

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Ajax php</title>
	<link rel="stylesheet" href="css/material.min.css">
	<script src="js/jquery-1.11.2.min.js"></script>
	<script src="js/SendForm.js"></script>
	<script src="js/material.min.js"></script>
</head>
<body>
    	<div class="mdl-grid">
		<div class="mdl-cell--4-col-phone mdl-cell--8-col-table mdl-cell--6-col-desktop mdl-cell--3-offset-desktop">
			<form action="php/proceso.php" method="POST" class="AjaxForm">
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" name="Nombre">
					<label class="mdl-textfield__label">Nombre</label>
				</div>
				<br><br>
				<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
					<input class="mdl-textfield__input" type="text" name="Apellido">
					<label class="mdl-textfield__label">Apelllido</label>
				</div>
				<br><br>
				<button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect", onclick="setTimeout(function(){location.reload();}, 1000);">
				 	Enviar datos
				</button>
			</form>
		</div>
	</div>
	<div class="msjRespuesta"></div>

<br>
	<div id="actualiza">
	<table border="1">
	  <tr>
		<td>Nombre</td>
		<td>Apellido</td>
	  </tr>
	 <?php
		$sql="SELECT * FROM usuario";
		$result=mysqli_query($conexion,$sql);
	        while($mostrar=mysqli_fetch_array($result)){	
	 ?>
    	  <tr>
		<td><?php echo $mostrar['Nombre']?></td>
		<td><?php echo $mostrar['Apellido']?></td>
	  </tr>
	<?php
	}
	?>	
      </table>
	</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>  
    <script type="text/javascript">
      //este es el metodo que lo mantendra actualizado 
        $(document).ready(function() {
          var refreshId =  setInterval( function(){  
         $('#actualiza').load('refresh.php');//actualizas el div
      }, 4000 );
    });
	</script>
</body>
</html>
