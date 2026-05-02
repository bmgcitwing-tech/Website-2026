<?php		
			  //*******************************************//
			 // Created By Sunny Khakse                   //
			//  Date : 10-march-2010                     //
		   //*******************************************//
//--------------------------------------------------------------------------------------------------------------------------------------------------------------------//
			
			
			function connection($db_name, $db_host='localhost', $db_user='root', $db_pass=null )
			{
				global $conn;
				global $db;
				$conn = mysql_connect($db_host, $db_user, $db_pass);
				if(!empty($conn))
					{
						return $conn;	
					}
				else{				
					$mysql_error = mysql_error();
					echo sql_err($mysql_error);
					}
				$db = mysql_select_db($db_name,$conn) or ($mysql_err = mysql_error());
				if(!empty($mysql_err)){
					$mysql_error = mysql_error()."<br><b> QUERY => ". $query."</b>";
						echo sql_err($mysql_error);}
				
			}
		
		
		
		function insert_data($table_name, $data)
			{
				$query = "insert into ".$table_name." (";
				foreach($data as $column => $values)
					{
						if(!is_numeric($column))
							{
								$query .= "".$column.",";
							}
					}
				$query = substr($query, 0, -1) . ") values (";
				foreach($data as $column => $values)
					{
						if(!is_numeric($column))
							{
								$query .= "'".$values."',";
							}
					}
				$query = substr($query, 0, -1) . ")";
				$res = mysql_query($query);
				if($res)
				{
					return $res;
				}
				else
				{
					$mysql_error = mysql_error()."<br><b> QUERY => ". $query."</b>";
						echo sql_err($mysql_error);
				}
				
			}
			
			function update_data($table_name, $data, $condition)
			{
				$query = "update ".$table_name." set ";
				foreach($data as $column => $values)
					{
						if(!is_numeric($column))
							{
								$query .= "".$column."='".$values."', ";
							}
					}
				$query = substr($query, 0, -2) ." where ";
					$query .= "".$condition."";
				
				$res = mysql_query($query);
				if($res)
				{
					return $res;
				}
				else
				{
					$mysql_error = mysql_error()."<br><b> QUERY => ". $query."</b>";
						echo sql_err($mysql_error);
				}
				
			}
			
			function delete_data($table_name, $condition)
				{
					$query = "delete from ".$table_name." where ";
					//$query .= "".key($condition)." = '". $condition[key($condition)]."' limit 1";
					$query .= "".$condition." limit 1";
					
					$res = mysql_query($query);
					if($res)
					{
						return $res;
					}
					else
					{
						$mysql_error = mysql_error()."<br><b> QUERY => ". $query."</b>";
						echo sql_err($mysql_error);
					}
					
				}
				
			function select_data($table_name, $condition=null, $parameter=null)
				{
					$query = "select * from ".$table_name."";
					if((isset($condition)) && (!empty($condition)))
					{
					//$query .= " where ".key($condition)." = '". $condition[key($condition)]."'";
					$query .= " where ".$condition."";

					}
					if((isset($parameter)) && (!empty($parameter)))
					{
					//$query .= " where ".key($condition)." = '". $condition[key($condition)]."'";
					$query .= " ".$parameter."";

					}
					$res = mysql_query($query);
					if($res)
					{
						return $res;
					}
					else
					{
						$mysql_error = mysql_error()."<br><b> QUERY => ". $query."</b>";
						echo sql_err($mysql_error);
						exit;
					}
				}
				
			  function query($db_query) {
				$res = mysql_query($db_query);
					if($res)
					{
						return $res;
					}
					else
					{
						$mysql_error = mysql_error()."<br><b> QUERY => ". $db_query."</b>";
						echo sql_err($mysql_error);
						exit;
					}
			  }
			  
			  function fetch_array($db_query) {
				return mysql_fetch_array($db_query);
			  }
			
			  function get_result($result, $row, $field = '') {
				return mysql_result($result, $row, $field);
			  }
			
			  function num_rows($db_query) {
				return mysql_num_rows($db_query);
			  }
			
			  function data_seek($db_query, $row_number) {
				return mysql_data_seek($db_query, $row_number);
			  }
			
			  function insert_id($link = 'db_link') {
				global $conn;
			
				return mysql_insert_id($conn);
			  }
			
			  function free_result($db_query) {
				return mysql_free_result($db_query);
			  }
			
			  function fetch_fields($db_query) {
				return mysql_fetch_field($db_query);
			  }
			
			  function db_output($string) {
				return htmlspecialchars($string);
			  }
			  
			  function sql_err($mysql_error)
			{
				$error_text = "<div style='background:#ffdddd;border:1px solid #990000;color:#ff0000;font-size:10px;font-family:verdana;padding:4px 4px 4px 20px'><b>MYSQL ERROR</b><br><li>".$mysql_error."</li><li>Please Contact Mr. Sunny Khakse @ 8087598939 / khakse.sunny@gmail.com.</li></div>";
				return $error_text;
			}
			
?>