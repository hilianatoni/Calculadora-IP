<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<title> Calip</title>
		<link rel="shortcut icon"  href="logo.png" type="image/x-icon">
		<!-- Imagem e texto -->
		<!--<nav class="navbar navbar-light bg-light">
		  <a class="navbar-brand" href="#">
		    <img src="logo.png" width="100" height="90" class="d-inline-block align-center" alt="">
		    Calip
		  </a> -->
		<nav class="menu">

			<img src="fundo.jpg" id="fundo">

			<!-- <img src="logo.png" id="logo">-->
		</nav>
		
	</head>

	<body>
		
		<br>
		<section class="coluna">
			
		</section>

		<section class="formulario">

			<h2 class="titulo"> Calculadora IP</h2>

			<form method="POST" action="resultado.php">
				<label for="ip" class="labels">Endereço IP:</label>
				<div class="divider"> </div>
				<input type="text" name="ip" class="form-control inputs" placeholder="Digite o endereço de IP...">
				<div class="divider"> </div>
				<br>
				<br>
				<label for="ip" class="labels">Máscara de sub-rede:</label>
				<div class="divider"> </div>
				<input type="text" name="mascara" class="form-control inputs"  placeholder="Digite a máscara de sub-rede...">
				<div class="divider"> </div>
				<input type="submit" class="botao" name="calcular" value="Calcular">
				<div class="divider"> </div>
			</form>

		</section>

		<section class="informacao">

			<h2 class="texto"> O que é e para que serve o número IP?</h2>
			<div class="divider"> </div>

			<p class="texto">O endereço IP é um número exclusivo atribuído a cada computador por um protocolo de internet. O endereço IP tem a função de identificar um computador em uma rede. Ele é fornecido pelo provedor da empresa que você contrata para fornecer internet à sua casa. A sigla IP significa Internet Protocol, ou, na nossa língua, protocolo de internet.</p>
			<div class="divider"> </div>
			<br>
			<br>

			<h2 class="texto"> O que é a máscara de sub-redes?</h2>
			<div class="divider"> </div>

			<p class="texto">Uma máscara de sub-rede tem a função de identificar em um endereço IPv4 qual porção representa o endereço de rede e qual porção representa o endereço de host. A máscara se assemelha a um endereço IPv4, ou seja, possui 4 bytes divididos por pontos em porções de 8 bits (octetos). A parte dos bits constituída por valores “1” representa qual parcela de um endereço IP serão vistos como endereço de rede e os bits que são todos zeros, representam o endereço de host.</p>

		</section>

		<div class="divider"> </div>
		<br>
		<footer> 
			<p class="creditos">Desenvolvido por Hiliana e Ruan</p>
			<p class="creditos"> 3INFO1 © 2019</p>
		</footer>

	</body>
</html>