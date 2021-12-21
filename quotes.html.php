<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>A database of quotes</title>
	

</head>
<body>

<a href="?addjoke">Add a quote</a>

<?php

foreach($quotes as $quote):

?>

	<form action="?deletejoke" method="post">

<?php
		
		echo '<p>'.$quote['quotetext'].' ';

?>

		Send by: <a href="mailto: <?php echo $quote['email']; ?>"><?php echo $quote['name']; ?></a>
		<input type="hidden" name="id" value="<?php echo $quote['id']; ?>">
		<input type="submit" value="Delete"></p>

	</form>

<?php endforeach; ?>


</body>
</html>