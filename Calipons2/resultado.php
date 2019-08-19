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
			<a href="index.php" ><img src="logo2.png" id="logo"></a>
			<h1 id="nome">CALIP</h1>
		</nav>
	</head>

	<?php 
	// Inclui a classe
	include 'funcoes.php';

	?>

	<body>

		<section class="coluna">
			
		</section>

		<section class="formulario">

			<h2 class="titulo"> Calculadora IP</h2>

			<form method="POST" action="resultado.php">
				<label for="ip" class="labels">Endereço IP:</label>
				<div class="divider"> </div>
				<input type="text" name="ip" class="form-control inputs" placeholder="Digite o endereço de IP..." value="<?php echo @$_POST['ip'];?>">
				<div class="divider"> </div>
				<label for="mascara" class="labels">Máscara de sub-rede:</label>
				<div class="divider"> </div>
				<select name="mascara" class="form-control inputs" value="<?php echo @$_POST['ip'];?>">
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

		<section class="caixa" style="margin-top: 6.5%;">

			<h2 class="texto"> Resultado </h2>
			<?php
			if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['ip'] ) ) {
			    $ip = new calc_ipv4();
			    //$ip  = new calc_ipv4( $_POST['mascara'] );
			    
			    if( $ip->valida_endereco() ) {
			        echo '<br>';
			        echo '<br>';
			        echo '<br>';
		        
			        echo "<b class='resultado'> Endereço completo/Rede: </b>" . $ip->endereco_completo() . '<br>';
			        echo "<b class='resultado'> Endereço: </b>" . $ip->endereco() . '<br>';
			        echo "<b class='resultado'> Prefixo CIDR: </b>/" . $ip->cidr() . '<br>';
			        echo "<b class='resultado'> Máscara de sub-rede: </b>" . $ip->mascara() . '<br>';
					echo "<b class='resultado'> IP da Rede: </b>" . $ip->rede() . '/' . $ip->cidr() . '<br>';
			        echo "<b class='resultado'> Endereço de Broadcast: </b>" . $ip->broadcast() . '<br>';
			        echo "<b class='resultado'> Primeiro endereço de host: </b>" . $ip->primeiro_ip() . '<br>';
			        echo "<b class='resultado'> Último endereço de host: </b>" . $ip->ultimo_ip() . '<br>';
			        echo "<b class='resultado'> Sub-redes possíveis:  </b>" . $ip->total_ips() . '<br>';
			        echo "<b class='resultado'> Hosts: </b>" . $ip->ips_rede() . '<br>';
			        echo "<b class='resultado'> Binário: </b>" . $ip->binario(). "<br>";
			        echo "<b class='resultado'> Classe da rede: </b>" . $ip->classe(). "<br>";		        
			        echo "<p class='resultado'> O Endereço informado é " . $ip->puborpriv(). "</p><br>";

			        echo "</pre>";

			    } else {
			    	echo '<br>';
			    	echo '<br>';
			    	echo '<br>';

			        echo "<b class='resultado' style='margin-left:36%;'> Endereço IPv4 inválido!";
			    }
			}
			?>
		</section>

		<div class="divider"> </div>
		<footer> 
			<p class="creditos">Desenvolvido por Hiliana e Ruan</p>
			<p class="creditos"> 3INFO1 © 2019</p>
		</footer>

	</body>
</html>
