<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<title> Calip</title>
		<link rel="shortcut icon"  href="logo.png" type="image/x-icon">
		<!-- Imagem e texto -->
		<!--<nav class="navbar navbar-light bg-light">
		  <a class="navbar-brand" href="#">
		    <img src="logo.png" width="100" height="90" class="d-inline-block align-center" alt="">
		    Calip
		  </a> -->
		<nav class="menu">
			<a href="index.php"><img src="logo2.png" id="logo"></a>
			<h1 id="nome">CALIP</h1>
		</nav>
	</head>

	<?php 
	// Inclui a classe
	include 'funcoes.php';

	ini_set('display_errors', 0 );
	error_reporting(0);

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

		
			<?php
			if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['ip'] ) OR $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['mascara'] ) ) {
			    $ip = new calc_ipv4();
			    
			    if( $ip->valida_endereco() ) {

			    	echo "<section class='caixa' style='margin-top: 6.5%;''>
							<h2 class='texto'> Resultado </h2>";

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
			        echo "<b class='resultado'> IPs possíveis:  </b>" . $ip->total_ips() . '<br>';
			        echo "<b class='resultado'> Sub-redes possíveis:  </b>" . $ip->quantidade_subredes() . '<br>';
			        echo "<b class='resultado'> Hosts: </b>" . $ip->ips_rede() . '<br>';
			        echo "<b class='resultado'> Binário: </b>" . $ip->binario(). "<br>";
			        echo "<b class='resultado'> Classe da rede: </b>" . $ip->classe(). "<br>";		        
			        echo "<p class='resultado'> O Endereço informado é " . $ip->puborpriv(). "</p><br>";

					echo "</pre>";
			    } elseif( empty( $_POST['ip'] )) {

			        echo  "<div class='alert alert-danger'>
 							 <strong style='margin-left:-10%;'>Erro!</strong> Endereço IPv4 inválido.
						   </div>";

			    } elseif( empty( $_POST['mascara'] )) {

			    	echo  "<div class='alert alert-danger'>
 							 <strong style='margin-left:-11.5%;'>Erro!</strong> Máscara de Sub-rede inválida.
						   </div>";
			    }
			}
			?>	
	    <button onclick="document.getElementById('id01').style.display='block'" class="w3-button" style="margin-left: 35%;margin-bottom: 2%; background-color: #557A95!important; border-radius: 6px; color: white;">Conferir Sub-redes</button>

	    
	    <div id="id01" class="w3-modal">
	      <div class="w3-modal-content w3-card-4">
	        <header class="w3-container w3-teal" style="background-color: #557A95!important;"> 
	          <span onclick="document.getElementById('id01').style.display='none'" 
	          class="w3-button w3-display-topright">&times;</span>
	          <h2 style="margin-left: 39%;">Bloco de Sub-redes</h2>       	
	        </header>
	        
	        <?php
	                        if ( $_SERVER['REQUEST_METHOD'] === 'POST' && ! empty( $_POST['ip'] ) ) {

	                            if( $ip->valida_endereco() ) {
	                                echo "<pre class='resultado'>";

	                                echo "<div class='divider'> </div>";

	                                echo "<div class='result'>";

	                                $quantidadeSubredes = $ip->quantidade_subredes();

	                                $mensagem = $ip->blocoSubrede();

	                                $j = 1;

	                                for ($i=0; $i < $quantidadeSubredes; $i++) { 

	                                	echo $j."º Sub-rede";

	                                	echo "<div class='divider'></div>";

	                                    echo $mensagem[$i];

	                                    $j++;

	                                }

	                                echo "</div>";

	                            } else {
	                                echo 'Endereço IPv4 inválido!';
	                            }
	                        }
	                    ?>
	           </div>
	      </div>
	    </div>

		</section>	
		<div class="divider"> </div>
		<footer style="margin-top: 12.5%;"> 
			<p class="creditos">Desenvolvido por Hiliana e Ruan</p>
			<p class="creditos"> 3INFO1 © 2019</p>
		</footer>

	</body>
</html>
