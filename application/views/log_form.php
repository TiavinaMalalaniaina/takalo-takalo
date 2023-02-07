<?php var_dump($this->session->userdata('user_id')) ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Log in</h1>
    <form action="<?php echo site_url('/log/login'); ?>" method="post">
        <input type="text" name="username" id="username" value="tiavina">
        <input type="password" name="mdp" id="mdp" value="malalaniaina">
        <?php if (strcmp($error,'')) { ?>
        <p style="color: red"><?php echo $error; ?></p>
        <?php } ?>
        <input type="submit" value="Valider">
    </form>
    <a href="<?php echo site_url('log/logout'); ?>">Log out</a>

    
    <?php echo form_open_multipart('content/do_upload');?>
        <input type="file" name="userfile" id="img">
        <input type="submit" value="upload">
    </form>
</body>
</html>