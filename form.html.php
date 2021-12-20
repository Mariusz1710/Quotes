<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>A database of quotes</title>

	<style>

		textarea
		{
			display: block;
			width: 100%;
		}

	</style>

</head>
<body>

<form action="?" method="post">

	<p><label for="quotetext">Enter a quote</label></p>

	<p>
		<textarea id="quotetext" name="quotetext">

		</textarea>

	</p>

	<p><label for="author">Enter your name</label>
	<input type="text" name="author"></p>

	<p><label for="email">Enter your email</label>
	<input type="email" name="email"></p>

	<p><input type="submit" value="Add"><p>

</form>

</body>
</html>