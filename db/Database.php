<?php



class Database {

    public $pdo;
    public $sqlite = __DIR__ . "/db.sqlite";
    public  function __construct() {

        try {
            //For SQLITE
            $this->pdo = new \PDO("sqlite:" . $this->sqlite);
            //For MySQL 
            // $this->pdo =  new \PDO("mysql:host=localhost;dbname=test", 'root', '');
            return $this->pdo;

        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function query($sql) {

        $statement = $this->pdo->prepare($sql);

        if (!$statement->execute()) {

            throw new \Exception("Something is up with your Select {$sql}!");
        }

        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
