<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/ajout.css">
	<title></title>
</head>
<body>
	<div class="contenu">
		<div class="form-container">
			<form action="#">
				<center>
					<h2 class="text-center"><strong>Modifier Objet</strong>
					</h2>
</center>
				<div class="form-group">
					<input type="text" name="name" class="form-control" placeholder="Name" required>
				</div>
				<div class="form-group">
				<select name="categorie" id="categorie" style="width:300px;height:25px;">
				<optgroup label="category">
                    <option>
                        <h1>Smartphone</h1>
                    </option>
                    <option>
                        <h1>Vetement</h1>
                    </option>
                    <option>
                        <h1>Chaussure</h1>
                    </option>
                    <option>
                        <h1>Sac</h1>
                    </option>
					<optgroup>
                </select>
				<div class="form-group">
					<input type="text" name="desc" class="form-control" placeholder="Description" required>
				</div>
				<div class="form-group">
					<input type="text" name="desc" class="form-control" placeholder="Upload" required>

</div>
<div class="b">
				<button class="b1"><a href="#">ADD</a></button>
				<button class="b2"><a href="<?php site_url('welcome/page/');?>">CANCEL</a></button>
			<div>				
		</form>

		</div>
	</div>
</body>
</html>