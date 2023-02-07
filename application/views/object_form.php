<!-- <?php var_dump($table);?> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste Object</title>
</head>
<body>
    <?php foreach ($table as $object) {?>
        <?php echo $object['titre'];?>
    <?php }?>
</body>
</html>