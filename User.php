<?php
class User{
    private $conn;

    public function __construct($db){
        $this->conn=$db;
    }
    
    public function registration($name,$login,$phone,$email,$password)
    {
    
        if(isset($_POST['reg']) || isset($_POST['addUser'])){
        $sql = "INSERT INTO users (name,login, phone, email, password) VALUES (:name,:login,:phone, :email, :password)";
        $stmt=$this->conn->prepare($sql);
         return $stmt->execute(['name'=>$name,'login'=>$login,'phone'=>$phone,'email'=>$email,'password'=>$password]);}
        
    }

    public function authorization($login){
        if(isset($_POST['autho'])){
     $sql ="SELECT * FROM users WHERE login = ?";
     $stmt=$this->conn->prepare($sql);
     $stmt->execute([$login]);
     return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  
}




public function isEmailExists($email) {

    $sql ="SELECT COUNT(*) FROM users WHERE email = :email";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute(['email' => $email]);
    return $stmt->fetchColumn() > 0;
}

public function isLoginExists($login) {

    $sql ="SELECT COUNT(*) FROM users WHERE login = :login";
    $stmt=$this->conn->prepare($sql);
    $stmt->execute(['login' => $login]);
    return $stmt->fetchColumn() > 0;
}


public function insertUser($name,$login,$phone,$email,$password)
{

    if(isset($_POST['addUser'])){
        $sql = "INSERT INTO users (name,login, phone, email, password) VALUES (:name,:login,:phone, :email, :password)";
        $stmt=$this->conn->prepare($sql);
         return $stmt->execute(['name'=>$name,'login'=>$login,'phone'=>$phone,'email'=>$email,'password'=>$password]);}
    
}
public function readUser()
{
    $sql = "SELECT * FROM users";
    $stmt=$this->conn->prepare($sql);
    if( $stmt->execute()){
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }else {
        // Если выполнение запроса не удалось, можно вернуть пустой массив или обработать ошибку
        error_log("Ошибка выполнения запроса: " . implode(", ", $stmt->errorInfo()));
        return [];
    }
    
}

public function updateUser($id,$name,$login,$phone,$email,$password)
{
    if(isset($_POST['editUser'])){
    $sql ="UPDATE users SET name=:name,login=:login, phone=:phone, email=:email,password=:password WHERE id=:id";
    $stmt=$this->conn->prepare($sql);
    return $stmt->execute(['id'=>$id,'name'=>$name,'login'=>$login,'phone'=>$phone,'email'=>$email,'password'=>$password]);
    }

}



public function deleteUser($id)
{if(isset($_POST['deleteUser'])){

    $sql ="DELETE FROM users WHERE id=:id";
    $stmt=$this->conn->prepare($sql);
    return $stmt->execute(['id'=>$id]);
    }
}



}