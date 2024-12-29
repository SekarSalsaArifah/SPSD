<html>
<head>
    <title>reCAPTCHA Example</title>
</head>
<body>
<form action="<?php echo base_url('/index.php/login/') ?>" method="post">
<?php echo $widget;?>
<?php echo $script;?>
<br />
<input type="submit" value="submit" />
</form>
</body>
</html>
