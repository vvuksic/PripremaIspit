<?php

class Database
{
    private static ?Database $instance = null;
    private PDO $connection;
    private string $table;
    private string $columns = "*";
    private array $where = [];

    private function __clone(){}
    private function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $dsn = "mysql:host=localhost;dbname=adventureworkshop;charset=utf8";
        $username = "root";
        $password = "";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        try {
            $this->connection = new PDO($dsn, $username, $password, $options);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }

    public function get()
    {
        $sql = "SELECT $this->columns FROM $this->table";

        if (!empty($this->where)) {
            $whereParts = [];
            foreach ($this->where as $condition) {
                $whereParts[] = "{$condition[0]} {$condition[1]} ?";
            }
            
            $sql .= " WHERE " . implode(" AND ", $whereParts);
        }
        
        $stmt = $this->connection->prepare($sql);
        $values = array_column($this->where, 2);
        $stmt->execute($values);
        
        return $stmt->fetchAll();
    }

    public function table(string $table): Database
    {
        $this->table = $table;
        return $this;
    }

    public function select(string|array $columns) : Database
    {
        $this->columns = is_array($columns) ? implode(", ", $columns) : $columns;
        return $this;
    }

    public function where(string $column, mixed $operator, mixed $value = null): Database
    {
        if(func_num_args() === 2){
            $value = $operator;
            $operator = "=";
        }

        $this->where[] = [$column, $operator, $value];
        return $this;
    }
}

$database = Database::getInstance();

$res = $database
    ->table('grad')
    ->select(['IDGrad', 'Naziv'])
    ->where('IDGrad', 1)
    ->where('Naziv', 'Zagreb')
    ->get();

var_dump($res);
