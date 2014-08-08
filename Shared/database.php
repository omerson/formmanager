<?php

	function db_connect()
	{
		$connection = @mysql_connect(HOST, USERNAME, PASSWORD);
		if(!$connection)
		{
			return false;
		}
		
		if(!mysql_select_db(DB_NAME))
		{
			return false;
		}
		
		return $connection;
	}
	
	function executeQuery($query)
	{		  
		$result = mysql_query($query);
		return $result;		
	}
	
	function isEmpty($result)
	{
        $number = mysql_num_rows($result);
		if ($number == 0) 
		{
		  return true;	
		}
		else 
		{
			return false;
		}
	}
