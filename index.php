<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PigLatin</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="js/submit.js"></script>
	<script src="js/blockEnter"></script>
</head>
<body>
	<div class="jumbotron" style="text-align: center">
		<h1>Pig Latin Translator</h1>      
	</div>
	<form method="post" id="myForm">
		<div class="form-group">
			<input type="text" class="form-control" id="input" name="input" placeholder="Enter english word" />
		</div>
		<input type="button" id="submitFormData" class="btn btn-primary" onclick="SubmitForm();" value="Translate" />
	</form>
	<div class="alert alert-primary" role="alert" id="results">	- </div>
</body>
</html>
