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
	$sql = "SELECT SynergyID, SynergyName, SynergyEffect, SynergyLevel from synergies";
	
	//Making sure connected, and then running SQL statement
	$result = mysqli_query($conn, $sql);
	
	//Run if Query has any rows
	if(mysqli_num_rows($result) > 0)
	{
		//Show data for each row
		while($row = mysqli_fetch_assoc($result))
		{
			//Display data retrieved
			echo "Synergy ID:".$row['SynergyID'] . 
			"|Synergy Name:".$row['SynergyName']. 
			"|Synergy Effect:".$row['SynergyEffect']. 
			"|Synergy Level:".$row['SynergyLevel']. 
			"|;";
		}
	}
?>