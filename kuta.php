<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Matematicas | Rakuta</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<a class="navbar-brand" href="#">Matematicas</a>
			<ul class="navbar-nav ml-auto mb-lg-0">
				<li class="nav-item">
					<a class="nav-link" href="eulerMejorado.php">Euler Mejorado</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">Euler</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" href="kuta.php">Runge - Kuta</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container-fluid">
		<h1 class="d-block text-center">Metodo Runge - Kuta</h1>
		<div class="col-9 p-5">
			<div class="row">
				<div class="col-5">
					<form action="" method="POST">
						<input type="text" class="form-control" name="valor" placeholder="Valor">
						<input type="submit" class="btn btn-success" name="enviar" value="Enviar">
					</form>
				</div>
				<div class="col-4">
					<img src="img/ecuacion.png" alt="ecuacion" class="w-75 m-auto">
				</div>
			</div>
		</div>
		<table class="table table-dark table-striped table-hover">
			<thead>
				<tr>
					<th>X<sub>n</sub></th>
					<th>Y<sub>n</sub></th>
					<th>Valor real</th>
					<th>Error</th>
					<th>Error relativo (%)</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(isset($_POST['enviar'])){
					$x = 1;
					$y = 1;
					$xy = 1.6;
					$h = (isset($_POST['valor'])) ? $_POST['valor'] : 1.7;
					for ($i=0; $x <= $xy; $i++) {
				?>
				<tr>
					<td><?php echo $x; ?></td>
					<td><?php echo $vaprox = number_format($y, 4); ?></td>
					<td><?php echo $valorR = number_format((exp((pow($x, 2))-1)), 4) ?></td>
					<td><?php echo number_format(($valorR-$vaprox), 4); ?></td>
					<td><?php echo number_format((($valorR-$vaprox)/$valorR)*100, 4) ?></td>
				</tr>
				<?php
						$k1 = $h * (2 * $x * $y);
						$k2 = $h * (2 * (($x + (0.5 * $h)) * ($y + (0.5 * $k1))));
						$k3 = $h * (2 * (($x + (0.5 * $h)) * ($y + (0.5 * $k2))));
						$k4 = $h * (2 * (($x + $h) * ($y + $k3)));
						$k4 = number_format($k4, 6);
						$y =+ $y + (0.166666 * ($k1 + (2 * $k2) + (2 * $k3) + $k4));
						$x =+ $x + $h;
					}
					}else{
				?>
				<tr>
					<td colspan="5">No hay datos</td>
				</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>