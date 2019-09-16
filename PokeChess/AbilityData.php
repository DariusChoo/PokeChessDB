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
	$sql = "SELECT AbilityID, AbilityName, AbilitySingleTarget, 
	AbilityAOE, AbilityDamage, AbilityType, AbilityLevel from abilities";
	
	//Making sure connected, and then running SQL statement
	$result = mysqli_query($conn, $sql);
	
	//Null Handling for AbilitySingleTarget and AbilityAOE
	$checkNull = "";
	$checkNull2 = "";
	
	//Run if Query has any rows
	if(mysqli_num_rows($result) > 0)
	{
		//Show data for each row
		while($row = mysqli_fetch_assoc($result))
		{
			//Check if AbilitySingleTarget and AbilityAOE is empty in each row
			if(empty($row['AbilitySingleTarget']))
			{
				$checkNull = "NULL";
			}
			if(empty($row['AbilityAOE']))
			{
				$checkNull2 = "NULL";
			}
			
			//Display data retrieved
			echo "Ability ID:".$row['AbilityID'] . 
			"|Ability Name:".$row['AbilityName']. 
			"|Ability Single Target:".$row['AbilitySingleTarget']. $checkNull .
			"|Ability AOE:".$row['AbilityAOE']. $checkNull2 . 
			"|Ability Damage:".$row['AbilityDamage']. 
			"|Ability Type:".$row['AbilityType']. 
			"|Ability Level:".$row['AbilityLevel']. 
			"|;";
			
			//Resetting checknull
			$checkNull = "";
			$checkNull2 = "";
		}
	}
?>