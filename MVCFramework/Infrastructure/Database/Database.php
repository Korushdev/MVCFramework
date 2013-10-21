<?php        
    namespace Infrastructure\Database
    {
        class Database
        {
            public $connectlink;	//Database Connection Link
            private $username = "";
            private $password = "";
            private $database = "";
            private $hostname = "localhost";
            private $resultlink;	//Database Result Recordset link
            private $rows;		//Stores the rows for the resultset   
 
            public function __Construct() {
	            $this->connectlink = mysqli_connect( $this->hostname, $this->username, $this->password, $this->database );
	            if( mysqli_connect_errno( $this->connectlink ) ) {
		            //throw new DatabaseConnectionException("Error Connecting to the Database".mysql_error(),"101");
	            }
	            else {
                    return TRUE;
	            }
            }
 
            public function __Destruct() {
	            if( isset( $this->connectLink ) )
                {
                    mysqli_close( $this->connectlink );
                }
            }
 
            public function Query( $sql ) {               
	            $this->resultlink = mysqli_query( $this->connectlink, $sql );
                if ( !$this->resultlink )
                {
                    die('Error: ' . mysqli_error( $this->connectlink ));
                }
                else
                {
	                return $this->resultlink;
                }
            }
 
            public function FetchRows( $result ) {
	            $rows = array();
	            if($result) {
		            while( $row = mysqli_fetch_object( $result ) ) {
			            $rows[] = $row;
		            }
	            }
	            else {
		            //throw new RetrieveRecordsException("Error Retrieving Records".mysql_error(),"102");
		            $rows = null;
	            }
	            return $rows;
            }      
 
            public function LastId() {
                return mysqli_insert_id( $this->connectlink );
            }
        }
    }
?>