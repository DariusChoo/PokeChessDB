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
	$sql = "SELECT UnitID, UnitName, UnitCost, UnitSynergy, UnitSynergy2, UnitHP, UnitMana, 
	UnitAbility, UnitAttackSpeed, UnitDamage, UnitArmor from units";
	
	//Making sure connected, and then running SQL statement
	$result = mysqli_query($conn, $sql);
	
	//Null Handling for Synergy 2
	$checkNull = "";
	
	//Run if Query has any rows
	if(mysqli_num_rows($result) > 0)
	{
		//Show data for each row
		while($row = mysqli_fetch_assoc($result))
		{
			//Check if Synergy2 is empty in each row
			if(empty($row['UnitSynergy2']))
			{
				$checkNull = "NULL";
			}
			
			//Display data retrieved
			echo "Unit ID:".$row['UnitID'] . 
			"|Unit Name:".$row['UnitName']. 
			"|Unit Cost:".$row['UnitCost']. 
			"|Unit Synergy:".$row['UnitSynergy']. 
			"|Unit Second Synergy:".$row['UnitSynergy2']. $checkNull . 
			"|Unit Health Points:".$row['UnitHP']. 
			"|Unit Mana Points:".$row['UnitMana']. 
			"|Unit Ability:".$row['UnitAbility']. 
			"|Unit Attack Speed: ".$row['UnitAttackSpeed']. 
			"|Unit Damage:".$row['UnitDamage'].
			"|Unit Armor:".$row['UnitArmor'].
			"|;";
			
			//Resetting checknull
			$checkNull = "";
		}
	}
?>