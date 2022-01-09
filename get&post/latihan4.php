<!DOCTYPE html>
<html>
<head>
	<title>POST</title>
</head>
<body>
<?php if (isset($_POST["submit"])) : ?>
	<h1>SELAMAT DATANG, <?php echo $_POST["nama"] ?></h1>
<?php endif; ?>

</body>
</html>