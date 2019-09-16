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
	$sql = "SELECT StatusID, StatusName, StatusDamage, StatusDuration, 
	StatusParalyzed, StatusFlinch, StatusConfusion, StatusLeechSeed, 
	StatusHeal from status";
	
	//Making sure connected, and then running SQL statement
	$result = mysqli_query($conn, $sql);
	
	//Null Handling
	$checkNull = "";
	$checkNull2 = "";
	$checkNull3 = "";
	$checkNull4 = "";
	$checkNull5 = "";
	$checkNull6 = "";
	$checkNull7 = "";
	
	//Run if Query has any rows
	if(mysqli_num_rows($result) > 0)
	{
		//Show data for each row
		while($row = mysqli_fetch_assoc($result))
		{
			//Check if rows with Null enabled is empty in each row
			if(empty($row['StatusDamage']))
			{
				$checkNull = "NULL";
			}
			if(empty($row['StatusDuration']))
			{
				$checkNull2 = "NULL";
			}
			if(empty($row['StatusParalyzed']))
			{
				$checkNull3 = "NULL";
			}
			if(empty($row['StatusFlinch']))
			{
				$checkNull4 = "NULL";
			}
			if(empty($row['StatusConfusion']))
			{
				$checkNull5 = "NULL";
			}
			if(empty($row['StatusLeechSeed']))
			{
				$checkNull6 = "NULL";
			}
			if(empty($row['StatusHeal']))
			{
				$checkNull7 = "NULL";
			}
			
			//Display data retrieved
			echo "Status ID:".$row['StatusID'] . 
			"|Status Name:".$row['StatusName']. 
			"|Status Damage:".$row['StatusDamage']. $checkNull .
			"|Status Duration:".$row['StatusDuration']. $checkNull2 . 
			"|Status Paralyzed:".$row['StatusParalyzed']. $checkNull3 .
			"|Status Flinch:".$row['StatusFlinch']. $checkNull4 .
			"|Status Confusion:".$row['StatusConfusion']. $checkNull5 .
			"|Status Leech Seed:".$row['StatusLeechSeed']. $checkNull6 .
			"|Status Heal:".$row['StatusHeal']. $checkNull7 .
			"|;";
			
			//Resetting checknull
			$checkNull = "";
			$checkNull2 = "";
			$checkNull3 = "";
			$checkNull4 = "";
			$checkNull5 = "";
			$checkNull6 = "";
			$checkNull7 = "";
		}
	}
?>