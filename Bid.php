<?php
class Bid{
private $conn;

public function __construct($db){
    $this->conn=$db;
}


public function insert($name, $comment, $user_id)
{

    if(isset($_POST['add'])){
    $sql = "INSERT INTO bid (name, comment, user_id) VALUES (:name, :comment, :user_id)";
    $stmt=$this->conn->prepare($sql);
     return $stmt->execute(['name'=>$name, 'comment'=>$comment, 'user_id'=>$user_id]);}
    
}
public function read()
{
    $sql = "SELECT bid.*, users.name AS user_name,users.login AS user_login , users.email AS user_email 
        FROM bid 
        JOIN users ON bid.user_id = users.id";

    $stmt=$this->conn->prepare($sql);
    if( $stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else {
        // Если выполнение запроса не удалось, можно вернуть пустой массив или обработать ошибку
        error_log("Ошибка выполнения запроса: " . implode(", ", $stmt->errorInfo()));
        return [];
    }
    
}

public function update($id,$name,$comment)
{
    if(isset($_POST['edit'])){
    $sql ="UPDATE bid SET name=:name,comment=:comment WHERE id=:id";
    $stmt=$this->conn->prepare($sql);
    return $stmt->execute(['id'=>$id,'name'=>$name,'comment'=>$comment]);
    }

}



public function delete($id)
{if(isset($_POST['delete'])){

    $sql ="DELETE FROM bid WHERE id=:id";
    $stmt=$this->conn->prepare($sql);
    return $stmt->execute(['id'=>$id]);
    }
}



}







