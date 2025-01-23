<?php 

class Connection{
    public readonly PDO $db;
    private $hostName;
    private $dbName;
    private $dbUser;
    private $dbPassword;

    public function __construct(string $hostName, string $dbName, string $dbUser, string $dbPassword){
        $this->hostName = $hostName;
        $this->dbName = $dbName;   
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
        $dbDsn = "mysql:host=$this->hostName;dbname=$this->dbName";

        $this->db = new PDO($dbDsn, $this->dbUser, $this->dbPassword);
    }

}
