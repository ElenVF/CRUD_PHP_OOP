<?php
class  Db
{
    private $dsn = "mysql:host=localhost;dbname=php_sam_crud";
    private $user = "root";
    private $password = "";
    public $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
            //echo 'Подключение произошло успешно';
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    // Метод для подготовки SQL-запроса
    public function prepare($sql)
    {
        return $this->conn->prepare($sql);
    }
    // Метод для выполнения SQL-запроса
    public function execute($stmt, $params = [])
    {
        return $stmt->execute($params);
    }
}
