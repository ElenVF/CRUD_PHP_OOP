<?php
class ActionController{
    private $model;
    private $user;
    public function __construct($db){
    $this->model = new Bid($db);
    $this->user = new User($db);
    
    }

    public function actionInsert() { 

        session_start(); // Инициализация сессии
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add'])  && isset($_SESSION['user_id'])) { 
            $name = $_POST['name'] ?? null; 
            $comment = $_POST['comment'] ?? null; 

            $user_id = $_SESSION['user_id'] ?? null; 
               
                if ($name && $comment && $user_id) { 
                    // Вставка данных в модель
                    if ($this->model->insert($name, $comment,$user_id )) {  
                        $_SESSION['message'] = 'Запись успешно сохранена!'; 
                        $_SESSION['message_type'] = 'success'; // Устанавливаем тип сообщения 
                    } else {  
                        $_SESSION['message'] = 'Ошибка при сохранении';  
                        $_SESSION['message_type'] = 'error'; 
                    }  
        
                    // Перенаправление на нужную страницу 
                    header('Location: index.php'); 
                    exit(); 
                } else { 
                    $_SESSION['message'] = 'Пожалуйста, заполните все поля.'; // Сообщение об ошибке 
                    $_SESSION['message_type'] = 'error'; 
                    header('Location: index.php'); // Перенаправление на нужную страницу 
                    exit(); 
                } 

           
            
            } 
        }
        





        public function actionUpdate() { 

            session_start(); // Инициализация сессии
           $id= isset($_GET['id']) ? $_GET['id'] : null;
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['edit']) ) { 
               
                $name = $_POST['name'] ?? null; 
                $phone = $_POST['phone'] ?? null; 
                $email = $_POST['email'] ?? null; 
                $comment = $_POST['comment'] ?? null; 
    
             
                   
                    if ($id && $name && $phone && $email && $comment) { 
                        // Вставка данных в модель
                        if ($this->model->update($id, $name,$phone, $email, $comment)) {  
                            $_SESSION['message'] = 'Запись успешно сохранена!'; 
                            $_SESSION['message_type'] = 'success'; // Устанавливаем тип сообщения 
                        } else {  
                            $_SESSION['message'] = 'Ошибка при сохранении';  
                            $_SESSION['message_type'] = 'error'; 
                        }  
            
                        // Перенаправление на нужную страницу 
                        header('Location: index.php'); 
                        exit(); 
                    } else { 
                        $_SESSION['message'] = 'Пожалуйста, заполните все поля.'; // Сообщение об ошибке 
                        $_SESSION['message_type'] = 'error'; 
                        header('Location: index.php'); // Перенаправление на нужную страницу 
                        exit(); 
                    } 
    
               
                
                } 
            }

            
            public function actionDelete() { 
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete']) ) { 
                $id = $_POST['id'] ?? null; 
               
                if ($this->model->delete($id)) {  
                    $_SESSION['message'] = 'Запись успешно удалена!'; 
                    $_SESSION['message_type'] = 'success'; // Устанавливаем тип сообщения 
                } else {  
                    $_SESSION['message'] = 'Ошибка при удалении';  
                    $_SESSION['message_type'] = 'error'; 
                } 
            

                header('Location: index.php'); 
                exit();  
            } 
    
        }
    
    
    
    
    
    
        public function actionRegistration() {  
            session_start(); // Инициализация сессии 
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && (isset($_POST['reg']) || isset($_POST['addUser']))) {  
                $name = $_POST['name'] ?? null;  
                $login = $_POST['login'] ?? null;  
                $phone = $_POST['phone'] ?? null;  
                $email = $_POST['email'] ?? null;  
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT) ?? null;  
        
                if ($name && $login && $phone && $email && $password) {  
                    // Проверка существования email
                    if ($this->user->isEmailExists($email)) {
                        $_SESSION['message'] = 'Этот email уже зарегистрирован.';  
                        $_SESSION['message_type'] = 'error';  
                        header('Location: index.php'); // Перенаправление на нужную страницу  
                        exit();  
                    }
                    if ($this->user->isLoginExists($login)) {
                        $_SESSION['message'] = 'Этот login уже зарегистрирован.';  
                        $_SESSION['message_type'] = 'error';  
                        header('Location: index.php'); // Перенаправление на нужную страницу  
                        exit();  
                    }
                    // Вставка данных в модель 
                    if ($this->user->registration($name, $login, $phone, $email, $password)) {   
                       if(isset($_POST['reg'])) $_SESSION['message'] = 'Вы успешно зарегистрированы!';  
                       else $_SESSION['message'] = 'Вы успешно добавили пользователя!';  
                        $_SESSION['message_type'] = 'success'; // Устанавливаем тип сообщения  
                    } else {   
                        $_SESSION['message'] = 'Ошибка при сохранении';   
                        $_SESSION['message_type'] = 'error';  
                    }   
        
                    // Перенаправление на нужную страницу  
                    header('Location: index.php');  
                    exit();  
                } else {  
                    $_SESSION['message'] = 'Пожалуйста, заполните все поля.'; // Сообщение об ошибке  
                    $_SESSION['message_type'] = 'error';  
                    header('Location: index.php'); // Перенаправление на нужную страницу  
                    exit();  
                }  
            }  
        }
        
     
        
    
    
            public function actionAuthorization() { 
                session_start(); // Инициализация сессии 
            
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['autho'])) { 
                    $login = $_POST['login']; 
                    $password = $_POST['password']; 
            
                    // Получаем данные пользователя один раз
                    $user = $this->user->authorization($login);
            
                    // Проверяем существует ли пользователь и соответствует ли пароль
                    if ($user && password_verify($password, $user['password'])) { 
                        // Успешная авторизация
                        $_SESSION['user_id'] = $user['id']; 
                        $_SESSION['login'] = $user['login']; 
                        $_SESSION['role'] = $user['role']; 
                        $_SESSION['message'] = 'Добро пожаловать, '.$login.'! Вы успешно  авторизованы';  
                        $_SESSION['message_type'] = 'success'; // Устанавливаем тип сообщения   
                    } else { 
                        $_SESSION['message'] = 'Пожалуйста, заполните все поля.'; // Сообщение об ошибке  
                        $_SESSION['message_type'] = 'error';  
                         
                    } 
                    header('Location: index.php'); // Перенаправление на нужную страницу  
                        exit(); 
                } 
            }
        


            public function actionLogout() {      
                session_start(); // Начинаем сессию 
            
                // Проверяем, действительно ли пользователь хочет выйти
                if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['logout'])) {     
                    if (isset($_SESSION['user_id'])) {
                        // Удаляем все переменные сессии
                        session_unset();
                        // Уничтожаем сессию
                        session_destroy();
                        $_SESSION['message'] = ' Вы успешно  вышли!';  
                        $_SESSION['message_type'] = 'success'; }
                         else { 
                            $_SESSION['message'] = 'Ошибка выхода.'; // Сообщение об ошибке  
                            $_SESSION['message_type'] = 'error';  
                            header("Location: index.php?logout=success"); // Перенаправление на нужную страницу  
                            exit();  
                        }  // Устанавливаем тип сообщения   
                      
                    }
               
                }   
                
                







                
                    
                    
            
            
            
            
            
                    public function actionUpdateUser() { 
            
                        session_start(); // Инициализация сессии
                       $id= isset($_GET['id']) ? $_GET['id'] : null;
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['editUser']) ) { 
                           
                            $name = $_POST['name'] ?? null;  
                            $login = $_POST['login'] ?? null;  
                            $phone = $_POST['phone'] ?? null;  
                            $email = $_POST['email'] ?? null;  
                            $password = password_hash($_POST['password'], PASSWORD_BCRYPT) ?? null;  
                
                         
                               
                                if ($name && $login && $phone && $email && $password) { 

                        
                                    // Вставка данных в модель
                                    if ($this->user->updateUser($id, $name, $login, $phone, $email, $password)) {  
                                        $_SESSION['message'] = 'Пользователь успешно сохранен!'; 
                                        $_SESSION['message_type'] = 'success'; // Устанавливаем тип сообщения 
                                    } else {  
                                        $_SESSION['message'] = 'Ошибка при сохранении';  
                                        $_SESSION['message_type'] = 'error'; 
                                    }  
                        
                                    // Перенаправление на нужную страницу 
                                    header('Location: index.php'); 
                                    exit(); 
                                } else { 
                                    $_SESSION['message'] = 'Пожалуйста, заполните все поля.'; // Сообщение об ошибке 
                                    $_SESSION['message_type'] = 'error'; 
                                    header('Location: index.php'); // Перенаправление на нужную страницу 
                                    exit(); 
                                } 
                
                           
                            
                            } 
                        }
            
                        
                        public function actionDeleteUser() { 
                            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['deleteUser']) ) { 
                            $id = $_POST['id'] ?? null; 
                           
                            if ($this->user->deleteUser($id)) {  
                                $_SESSION['message'] = 'Пользователь успешно удален!'; 
                                $_SESSION['message_type'] = 'success'; // Устанавливаем тип сообщения 
                            } else {  
                                $_SESSION['message'] = 'Ошибка при удалении';  
                                $_SESSION['message_type'] = 'error'; 
                            } 
                        
            
                            header('Location: index.php'); 
                            exit();  
                        } 
                
                    }















            } 
            
        
    