<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My jokes Application</title>
	<style type="text/css">
		.joke
		{
			font-family: Georgia, serif;
			font-size: 25px;
			letter-spacing: 2px;
			word-spacing: 2px;
			text-align: center;
		}

		.mybutton
		{
			box-shadow: 0px 10px 14px -7px #3e7327;
			background: linear-gradient(to bottom, ##77b55a 5%, 72b352 100%);
			background-color: #77b55a;
			border: 1px solid #4b8f29;
			display: inline-block;
			cursor: pointer;
			color: #ffffff;
			font-family: Arial;
			font-size: 13px;
			font-weight: bold;
			padding: 6px 12px;
			text-shadow: 0px 1px 0px #5b8a3c;
		}
		.wrapper
		{
			text-align: center;
		}
	</style>
	<script type="text/javascript">
		function showAnswer()
		{
			answer = document.getElementById("answer")
			answer.style.display = "block"
		}
	</script>


</head>
<body>


<?php

$curl = curl_init();
$URL = "https://official-joke-api.appspot.com/jokes/programming/random";
curl_setopt($curl, CURLOPT_URL, $URL);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
$response = curl_exec($curl);
$err = curl_errno($curl);

if ($err)
{
	die("Curl Error: " . $err);
}
else
{
	//echo "It worked";
}

//echo(gettype($response));

$response = json_decode($response, true);
//echo(gettype($response));

// foreach ($response as $key => $value) 
// {
// 	echo("IN ARRAY");
// 	if (gettype($value)== "array")
// 	{
// 		echo ("inside inner array<br><br>");
// 		foreach ($value as $key2 => $value2) 
// 		{
// 			echo ("Key: $key2   |   value: $value2<br>");

// 		}
// 	}
// 	else
// 	{
// 		echo("key: $key   |   value: $value");

// 	}

// }


	echo("<p class= 'joke'>" .$response[0]['setup']. "</p>");

	echo "<form method= 'post'>";

	echo "<div class= 'wrapper'>";

	echo "<input class='mybutton' type= 'button' value= 'Reveal Answer' onclick= 'showAnswer();'>";
	echo "<input class='mybutton' type= 'submit' value= 'New Joke' onclick= 'submit'>";
	echo "</form>";
	echo "</div>";

	echo("<p class= 'joke' id = 'answer' style= 'display:none;'>" .$response[0]['punchline']. "</p>");
	



?>


</body>
</html>