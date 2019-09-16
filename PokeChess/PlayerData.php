<?php
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbName = "PokeChess";
	
	//Make Connection
	$conn = new mysqli($servername, $username, $password, $dbName);
	
	//Check Connection
	if(!$conn)
	{
		die("Connection Failed. ". mysqli_connect_error());
	}
	
	//SQL Statement
	$sql = "SELECT PlayerId, PlayerName, PlayerPass, PlayerEXP from players";
	
	//Making sure connected, and then running SQL statement
	$result = mysqli_query($conn, $sql);
	
	//Run if Query has any rows
	if(mysqli_num_rows($result) > 0)
	{
		//Show data for each row
		while($row = mysqli_fetch_assoc($result))
		{
			//Display data retrieved
			echo "Player ID:".$row['PlayerId'] . 
			"|Player Name:".$row['PlayerName']. 
			"|Player Password:".$row['PlayerPass']. 
			"|Player EXP:".$row['PlayerEXP'].
			"|;";
		}
	}
?>