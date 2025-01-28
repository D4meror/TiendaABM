<?php

include 'Global/config.php';
include 'Global/conexion.php';
include 'carrito.php';

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tienda</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
	<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo de la empresa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Carrito</a>
        </li>
       
    </div>
  </div>
</nav>

<br/>
<br/>

<div class="container">
	<br>
	<div class="alert alert-success">
		<?php echo $mensaje ?>
		<a href="#" class="badge badge-success">ver carrito </a>	
	</div>

	<div class="row">
		<?php
		$sentencia =$pdo->prepare("SELECT * FROM productos");
		$sentencia->execute();
		$listaProductos=$sentencia->fetchAll(PDO::FETCH_ASSOC);
		//print_r($listaProductos);
		?>
		<?php foreach($listaProductos as $producto){ ?>
			<div class="col-3">
			<div class="card">
				<img 
				title="<?php echo $producto['nombre']; ?>"
				alt="titulo" 
				class="card-img-top" 
				src="<?php echo $producto['img']; ?>"
				data-bs-toggle="popover"
				data-bs-trigger="hover"
				data-bs-content="<?php echo htmlspecialchars($producto['descripcion'], ENT_QUOTES, 'UTF-8'); ?>">
				
				

				
				<div class="card-body">
					<span><?php echo $producto['nombre']; ?></span>
					<h5>$<?php echo $producto['precio']; ?></h5>
					<p>contenido</p>
					<form action="" method="post">
						<?php 
						
						?>
						<input type="text" name="id" id="id" value="<?php echo openssl_encrypt($producto['id'],COD,KEY); ?>"> 
						<input type="text" name="nombre" id="nombre" value="<?php echo openssl_encrypt($producto['nombre'],COD,KEY); ?>">
						<input type="text" name="precio" id="precio" value="<?php echo openssl_encrypt($producto['precio'],COD,KEY); ?>">
						<input type="text" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt($producto['cantidad'],COD,KEY); ?>">
						<button class="btn btn-primary" type="submit" name="btnAccion" value="agregar" >
						agregar al carrito 
					</button>
					</form>
					
				</div>
			</div>
		</div>
		<?php }; ?>		
</div>

<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function () {
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
        return new bootstrap.Popover(popoverTriggerEl);
    });
});
</script>

</body>
</html>