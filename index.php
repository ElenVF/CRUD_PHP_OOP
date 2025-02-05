<?php
require_once('action.php');

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Bootstrap Example</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  </head>
  <body class="p-3 m-0 border-0 bd-example m-0 border-0">
  <script>
        // Проверяем, есть ли сообщение в сессии
        <?php if (isset($_SESSION['message'])): ?>
            swal({
                title:  "<?php echo $_SESSION['message']; ?>",
                
                icon: "success",
                button: "ОК",
            });
            <?php unset($_SESSION['message']); // Удаляем сообщение из сессии после его отображения ?>
        <?php endif; ?>
    </script>

    <!-- Example Code -->
    <div class="main">
    <nav class="navbar navbar-expand-lg ">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><i class="fa fa-bug"></i>&nbsp Crud</font></font></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Главная</font></font></a>
            </li> <?php if ($isAuthenticated): ?>
              <?php if (!$RoleUser): ?>
            <li class="nav-item">
              <a class="nav-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Админ. панель</font></font></a>
            </li>
            <?php else: ?>
            <li class="nav-item">
              <a class="nav-link" href="#"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Заявки</font></font></a>
            </li>
            <?php endif; ?>
            <?php endif; ?>
           
          </ul>
          <form class="d-flex mb-2 mb-lg-0" >
          <div>
            <?php if (!$isAuthenticated): ?>
                <button class="btn btn-outline-dark" type="button" data-bs-toggle="modal" data-bs-target="#authoModal">Авторизация</button>
                &nbsp;&nbsp;
                <button class="btn btn-outline-warning" type="button" data-bs-toggle="modal" data-bs-target="#regModal">Регистрация</button>
            <?php else: ?>
                <span class="me-2">Привет, <?= $_SESSION['login'] ?>!</span>
                <form action="index.php?logout" method="get" style="display:inline;" >
                    <button class="btn btn-outline-danger" type="submit" name="logout">Выход</button>
                </form>
            <?php endif; ?>
        </div>
        </div>
      </div>
    </nav>
    

<?php include_once('listBids.php')?>
<?php if ($isAuthenticated && !$RoleUser ):   ?>
  <?php include_once('listUsers.php') 
?>
       <?php endif; ?>

<div class="container">
  <footer class="py-3 my-4 ">
    <ul class="nav justify-content-center border-bottom pb-3 mb-3">
      <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Главная</a></li>
  
      <?php if ($isAuthenticated):?>
        <?php if ($RoleUser): ?> <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Заявки</a></li>  <?php else: ?>
        <li class="nav-item">
              <a class="nav-link" href="#">Админ. панель</a>
            </li>
            <?php endif; ?>
        <?php endif; ?>
    
    </ul>
    <p class="text-center text-body-secondary">© 2024 Company, Inc</p>
  </footer>
</div>









<!-- Modal REGISTRATION-->
<div class="modal fade" id="regModal" tabindex="-1" aria-labelledby="regModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="regModalLabel">Регистрация</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="index.php" method="post">
     <div class="mb-3">
    <label for="name" class="form-label name">Имя</label>
    <input type="text" class="form-control name" id="name" name="name" aria-describedby="name" placeholder="Вася Александрович Пупкин">
    </div>
    <div class="mb-3">
    <label for="login" class="form-label login">Логин</label>
    <input type="text" class="form-control login" id="login" name="login" aria-describedby="login" placeholder="Login123331">
    </div>
    <div class="mb-3">
    <label for="phone" class="form-label phone">Телефон</label>
    <input type="tel" class="form-control phone" id="phone"  name="phone" aria-describedby="phone" placeholder="89219999999">
    </div>
     <div class="mb-3">
    <label for="email" class="form-label email">Адрес электронной почты</label>
    <input type="email" class="form-control email" id="email"  name="email" aria-describedby="emailHelp" placeholder="mail@mail.com">
    <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
  </div>

  <div class="mb-3">
  <label for="password" class="form-label password">Пароль</label>
  <input type="password" class="form-control password" id="password"  name="password" aria-describedby="passwordHelp" >
 
</div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="submit" class="btn btn-primary" name="reg">Зарегистрироваться</button>
      </div> </form>
    </div>
  </div>

</div>




<!-- Modal AUTHOR-->
<div class="modal fade" id="authoModal" tabindex="-1" aria-labelledby="authoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="authoModalLabel">Регистрация</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="index.php" method="post">
     <div class="mb-3">
    <label for="login" class="form-label login">Логин</label>
    <input type="text" class="form-control login" id="login" name="login" aria-describedby="login" placeholder="Login123331">
    </div>


  <div class="mb-3">
  <label for="password" class="form-label password">Пароль</label>
  <input type="password" class="form-control password" id="password"  name="password" aria-describedby="passwordHelp" >
 
</div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="submit" class="btn btn-primary" name="autho">Авторизоваться</button>
      </div> </form>
    </div>
  </div>

</div>

<script>
$(document).ready(function() {
    



    $("table").DataTable(
                  {
                    order:[0,'desc'],
                    language: {
            "sEmptyTable": "Нет данных в таблице",
            "sInfo": "Показано _START_ до _END_ из _TOTAL_ записей",
            "sInfoEmpty": "Показано 0 до 0 из 0 записей",
            "sInfoFiltered": "(отфильтровано из _MAX_ записей)",
            "sLengthMenu": "Показать _MENU_ записей",
            "sLoadingRecords": "Загрузка...",
            "sProcessing": "Обработка...",
            "sSearch": "Поиск:",
            "sZeroRecords": "Совпадений не найдено",
            "oPaginate": {
                "sPrevious": "<i class='fa fa-chevron-left'></i>", // Стрелка назад
                "sNext": "<i class='fa fa-chevron-right'></i>"     // Стрелка вперед
            }
           
            
        }

                    
                  });
});
</script>



  </body>
</html>