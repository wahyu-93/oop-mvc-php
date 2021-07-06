<?php 

class Database
{
    private $dbh;
    private $stmt;

    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_pass = DB_PASS;
    private $db_name = DB_NAME;

    public function __construct()
    {
        // datasource name - 'mysql:host=localhsor;dbname='namedatabase';
        $dsn = 'mysql:host='. $this->db_host .';dbname='. $this->db_name;

        $option = [
            // menjaga persisten koneksi database; 
            PDO::ATTR_PERSISTENT => true,
            // mode error
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            // make conn
            // new PDO(datasorce_name, user, pass, optional);
            $this->dbh = new PDO($dsn, $this->db_user, $this->db_pass, $option);
        } 
        catch(PDOException $e){
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type=null)
    {
        if (is_null($type)){
            switch(true){
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        // bindValue ngecek variabael yang dimasukkan manual ke db
        // conthph selecet .... where id = :id 
        // bindValue(:id, value, $type);
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }
}