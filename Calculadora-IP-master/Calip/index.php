<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<title> Calip</title>
		<!-- Imagem e texto -->
		<!--<nav class="navbar navbar-light bg-light">
		  <a class="navbar-brand" href="#">
		    <img src="logo.png" width="100" height="90" class="d-inline-block align-center" alt="">
		    Calip
		  </a> -->
		<nav class="menu">
			<img src="logo.png" id="logo">
			<h1 id="nome">Calip</h1>
		</nav>
	</head>
	<body>

		<section class="formulario">

			<h2 class="titulo"> Calculadora IP</h2>

			<form>
				<label for="ip" class="labels">Endereço IP:</label>
				<div class="divider"> </div>
				<input type="text" name="ip" class="form-control inputs" placeholder="Digite o endereço de IP...">
				<div class="divider"> </div>
				<label for="ip" class="labels">Máscara de subrede:</label>
				<div class="divider"> </div>
				<input type="text" name="mascara" class="form-control inputs"  placeholder="Digite a máscara de subrede...">
				<div class="divider"> </div>
				<input type="submit" class="labels name="calcular" value="Calcular">
				<div class="divider"> </div>
			</form>

		</section>

		<section class="resultado">

			<h2 class="texto"> O que é e para que serve o número IP?</h2>
			<div class="divider"> </div>

			<p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
			<div class="divider"> </div>

			<h2 class="texto"> O que é a máscara de sub-redes?</h2>
			<div class="divider"> </div>

			<p class="texto">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in </p>

		</section>

		<div class="divider"> </div>
		<footer> 
			<p class="creditos">Desenvolvedores: Hiliana e Ruan</p>
			<p class="creditos"> 3INFO1 © 2019</p>
		</footer>

	</body>
</html>