<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/liste.css">
    
    <title>Document</title>
</head>
<body>
    <div class="header">
        <div class="search">    
            <form action="#">
                <center>
                <input type="text" name="mot_cle" placeholder="key word" required>
                <select name="categorie" id="categorie" style="width:300px;height:25px;">
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
                </select>
                <button class="bt">Search</button>
</center>
            </form>
        </div>
</div>
