<?php
class MySQLi_Db 
{
	public $connection;
	public $result;
	public $db;
	public $host;
	public $userName;
	public $password;
	public $databaseName;
	public $rows;
	
	public function __construct(){

	  	$this->host ='localhost';
        $this->userName ='root';
        $this->password ='';
        $this->databaseName ='abc';
        $this->rows ='';
        $this->connectToDb();    
	}
	public function __destruct(){
		mysqli_close($this->connection);
	}
	/**
	 * connectToDb establishes database connection
	 * @return only returns an error if connection was unsuccessful
	 * Method used through __construct() only
	 */
	public function connectToDb(){

		
		$this->connection = new mysqli($this->host,$this->userName,$this->password,$this->databaseName);
		if(mysqli_connect_error()){
			return "can not connect to database ".mysqli_connect_error();
		}
	}
	/**
	 * Run select, insert, update or delete query
	 * A successful query will return $result as true
	 */
	public function query($query)
	{
		$this->result = $this->connection->query($query);
		return $this->result;
	}
	/**
	 * For select queries run query($query) and then fetch() to get result rows
	 * @return associative array of all selected rows
	 * example usage
	 * $rows = $db->fetch();
	 */
	public function fetch(){
		if(!$this->result){
			return "no results";
		}
		while($row = $this->result->fetch_assoc()){
			$rows[] = $row;
		}
		return $rows;
	}
}

?>
