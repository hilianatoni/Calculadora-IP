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
			<img src="logo2.png" id="logo">
			<h1 id="nome">CALIP</h1>			
		</nav>
	</head>

	<?php 
	// Inclui a classe
	include 'funcoes.php';

	//ini_set('display_errors', 0 );
	//error_reporting(0);

	?>

	<body>

		<section class="coluna">
			
		</section>

		<section class="formulario">

			<h2 class="titulo"> Calculadora IP</h2>

			<form method="POST" action="resultado.php">
				<label for="ip" class="labels">Endereço IP:</label><small>(Ex.: 192.172.0.1)</small>
				<div class="divider"> </div>
				<input type="text" name="ip" class="form-control inputs" placeholder="Digite o endereço de IP..." value="<?php echo @$_POST['ip'];?>">
				<div class="divider"> </div>
				<label for="mascara" class="labels">Máscara de sub-rede:</label>
				<div class="divider"> </div>
				<select name="mascara" class="form-control inputs">
					<option value="" disabled selected>Selecione a máscara de sub-rede...</option>
					<option value="24">/24</option>
					<option value="25">/25</option>
					<option value="26">/26</option>
					<option value="27">/27</option>
					<option value="28">/28</option>
					<option value="29">/29</option>
					<option value="30">/30</option>
					<option value="31">/31</option>
					<option value="32">/32</option>
				</select>
				<div class="divider"> </div>

				
				<button type="submit" name="calcular" value="calcular" class="botao">Calcular</button>
				
				
				
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

			<p class="texto">O CIDR, ou endereçamento IP sem classes, otimiza a distribuição dos endereços IP de 32 bits, permitindo máscaras de rede de qualquer tamanho.
			O endereçamento CIDR usa a notação / (barra) para indicar a quantidade de bits que identifica a rede (que pode ser qualquar valor entre 0 e 32 bits) e, por consequência, a quantidade de bits que identificam hosts dentro da rede.</p>

		</section>

		<div class="divider"> </div>
		<footer> 
			<p class="creditos">Desenvolvido por Hiliana e Ruan</p>
			<p class="creditos"> 3INFO1 © 2019</p>
		</footer>

	</body>
</html>
