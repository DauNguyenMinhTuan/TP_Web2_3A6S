<?php
class Database
{
    private $db_name = DB_NAME;
    private $db_host = DB_HOST;
    private $db_user = DB_USER;
    private $db_password = DB_PASSWORD;
    private $connexion;
    private $statement;

    public function __construct()
    {
        $this->connexion = null;
        try {
            $this->connexion = new PDO(
                'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name,
                $this->db_user,
                $this->db_password
            );
        } catch (PDOException $exception) {
            echo "Error: " . $exception->getMessage();
        }
    }

    public function prepare($sql)
    {
        $this->statement = $this->connexion->prepare($sql);
    }

    public function execute()
    {
        $this->statement->execute();
    }

    public function single()
    {
        $this->execute();
        return $this->statement->fetch();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->statement->fetchAll();
    }

    public function rowCount()
    {
        return $this->statement->rowCount();
    }
}

?>