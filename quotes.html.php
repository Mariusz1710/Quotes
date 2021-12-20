<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>A database of quotes</title>
	

</head>
<body>

<a href="?addjoke">Add a quote</a>

<?php

foreach($quotes as $quote)
{
	echo '<p>'.$quote.'</p>';
}



?>





</body>
</html>