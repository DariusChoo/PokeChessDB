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
	$sql = "SELECT RankName, RankEXP from ranks";
	
	//Making sure connected, and then running SQL statement
	$result = mysqli_query($conn, $sql);
	
	//Null Handling for RankEXP
	$checkNull = "";
	
	//Run if Query has any rows
	if(mysqli_num_rows($result) > 0)
	{
		//Show data for each row
		while($row = mysqli_fetch_assoc($result))
		{
			//Check if Synergy2 is empty in each row
			if(empty($row['RankEXP']))
			{
				$checkNull = "NULL";
			}
			
			//Display data retrieved
			echo "Rank Name:".$row['RankName'] .  
			"|Rank EXP:".$row['RankEXP']. $checkNull . 
			"|;";
			
			//Resetting checknull
			$checkNull = "";
		}
	}
?>