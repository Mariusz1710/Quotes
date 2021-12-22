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


	<p><label for="category">Enter first category</label></p>

<select id="category" name="category[]" multiple size=6>

	<option value="politician">Politician</option>
	<option value="scientist">Scientist</option>
	<option value="writer">Writer</option>
	<option value="activist">Activist</option>
	<option value="philosopher">Philosopher</option>
	<option value="poet">Poet</option>
	<option value="coach">Coach</option>
	<option value="american">American</option>
	<option value="british">British</option>
	<option value="african">African</option>
	<option value="producer">Producer</option>
	<option value="businessman">Businessman</option>

</select>

	<p><input type="submit" value="Add"><p>

</form>



</body>
</html>