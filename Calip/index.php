<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	<title> Calip</title>
	<!-- Imagem e texto -->
	<nav class="navbar navbar-light bg-light">
	  <a class="navbar-brand" href="#">
	    <img src="logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
	    Calip
	  </a>
</nav>
</head>
<body>

	<h2 class="titulo"> Calculadora IP</h2>

	<form>
		<label for="ip" class="labels">Endereço IP:</label>
		<div class="divider"> </div>
		<input type="text" name="ip" class="form-control inputs">
		<div class="divider"> </div>
		<label for="ip" class="labels">Máscara de subrede:</label>
		<div class="divider"> </div>
		<input type="text" name="mascara" class="form-control inputs">
		<div class="divider"> </div>
		<input type="submit" class="labels name="calcular" value="Calcular">
		<div class="divider"> </div>
	</form>

</body>
</html>