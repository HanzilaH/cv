
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
