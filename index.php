<!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>ATM</title>
	<link rel="stylesheet" href="style.css">


</head>
<body>

<?php

if(isset($_GET['addjoke']))
{
	include 'form.html.php';
	exit();
}

try
{
	$conn = new PDO("mysql: host=localhost;dbname=quotes","root","");
	$conn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$conn -> exec('SET NAMES utf8');
}
catch(PDOException $e)
{
	$error = "No database connection";
	include "error.html.php";
	exit();
}

if(isset($_POST['quotetext']))
{
	$quotetext = $_POST['quotetext'];
	$author = $_POST['author'];
	$email = $_POST['email'];

	try
	{	
		$sql_author = "SELECT id, name FROM author";
		$result = $conn -> query($sql_author);
		$how_authors = $result -> rowCount();
		foreach($result as $row)
		{
			if($row['name'] == $author)
			{
				$id = $row['id'];
				$new = false;
				break;
			}
			else
			{
				$new = true;
				$id = $result -> rowCount();
				$id++;
			}
		}


		if($new)
		{
			try
			{
				$sql = 'INSERT INTO author VALUES (NULL,:author)';
				$s = $conn -> prepare($sql);
				$s -> bindValue(":author",$author);
				$s -> execute();

				/*$sql2 = 'INSERT INTO email VALUES (NULL, :email,:authorid)';
				$s = $conn -> prepare($sql2);
				$s -> bindValue(":email",$email);
				$s -> bindValue(":authorid",$id);
				$s -> execute();*/
			}
			catch(PDOException)
			{
				$error = "Error during adding a new quote 111";
				include 'error.html.php';
				exit();
			}
		}

		try
		{
			$sql_email = "SELECT email FROM email";
			$result = $conn -> query($sql_email);

			foreach($result as $row)
			{
				if($row['email'] == $email)
				{
					$newm = false;
					break;
				}
				else
				{
					$newm = true;
				}
			}

			if($newm)
			{
				$sql2 = "INSERT INTO email VALUES (NULL, :email, :authorid)";
				$s = $conn -> prepare($sql2);
				$s -> bindValue(":email", $email);
				$s -> bindValue(":authorid", $id);
				$s -> execute();
			}
		}
		catch(PDOException $e)
		{
			$error = "Error during adding an email";
			include 'error.html.php';
			exit();
		}

		try
		{
			$sql = 'INSERT INTO quote VALUES (NULL,:quote,CURRENT_DATE,:authorid)';
			$s = $conn -> prepare($sql);
			$s -> bindValue(":quote",$quotetext);
			$s -> bindValue(":authorid",$id);
			$s -> execute();
		}
		catch(PDOException $e)
		{
			$error = "Error during adding a new quote 222";
			include 'error.html.php';
			exit();

		}

	}
	catch(PDOException $e)
	{
		$error = "Error during adding new quote 333 ".$e -> getMessage();
		include 'error.html.php';
		exit();
	}


	header('Location: .');
	exit();
}

if(isset($_GET['deletejoke']))
{
	try
	{
		$sql_delete = "DELETE FROM quote WHERE id = ".$_POST['id'];
		$conn -> query($sql_delete);
	}
	catch(PDOException $e)
	{
		$error = "Error during deleting the joke";
		include 'error.html.php';
		exit();
	}

	header('Location: .');
	exit();
}

try
{
	$sql = "SELECT quote.id, quotetext, name, email FROM quote INNER JOIN author ON quote.authorid = author.id INNER JOIN email ON author.id = email.authorid";
	$result = $conn -> query($sql);
}
catch(PDOException $e)
{
	$error = "Error during receiving data from the database". $e -> getMessage();
	include 'error.html.php';
	exit();
}

foreach($result as $row)
{

	$quotes [] = array('id' => $row['id'], 'quotetext' => $row['quotetext'], 'name' => $row['name'], 'email' => $row['email']);

}

include 'quotes.html.php';

?>

</body>
</html>