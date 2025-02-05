<?php
class Bid{
private $conn;

public function __construct($db){
    $this->conn=$db;
}


public function insert($name,$phone,$email,$comment)
{

    if(isset($_POST['add'])){
    $sql = "INSERT INTO bid (name, phone, email, comment) VALUES (:name, :phone, :email, :comment)";
    $stmt=$this->conn->prepare($sql);
     return $stmt->execute(['name'=>$name,'phone'=>$phone,'email'=>$email,'comment'=>$comment]);}
    
}
public function read()
{
    $sql = "SELECT * FROM bid";
    $stmt=$this->conn->prepare($sql);
    if( $stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else {
        // Если выполнение запроса не удалось, можно вернуть пустой массив или обработать ошибку
        error_log("Ошибка выполнения запроса: " . implode(", ", $stmt->errorInfo()));
        return [];
    }
    
}

public function update($id,$name,$phone,$email,$comment)
{
    if(isset($_POST['edit'])){
    $sql ="UPDATE bid SET name=:name, phone=:phone, email=:email,comment=:comment WHERE id=:id";
    $stmt=$this->conn->prepare($sql);
    return $stmt->execute(['id'=>$id,'name'=>$name,'phone'=>$phone,'email'=>$email,'comment'=>$comment]);
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







