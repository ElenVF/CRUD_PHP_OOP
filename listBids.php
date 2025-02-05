
<div class="content">
    <h1 class="title text-center mt-5">Заявки</h1>  <?php if ($isAuthenticated  ): ?>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
  
    <button class="btn btn-outline-success me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#addModal">Создать заявку</button>
  
</div>  <?php endif; ?>
<div class="mb-5 "></div>

<?php if (!empty($bids)): ?>
    <table class="table table-hover mt-5">
  <thead>
    <tr class="text-center">
      <th scope="col">ID</th>
      <th scope="col">ТЕМА ОБРАЩЕНИЯ</th>
  
      <th scope="col">КОММЕНТАРИЙ</th>
      <th scope="col">ИМЯ</th>
      <th scope="col">ЛОГИН</th>
      <th scope="col">EMAIL</th>
      <th scope="col">ДЕЙСТВИЕ</th>

     </tr>
  </thead>
  <tbody>

  <?php foreach ($bids as $bid): ?>
    <tr class="text">
      <td ><?= $bid['id'] ?></td>
      <td> <?= $bid['name'] ?></td>
      <td><?= $bid['comment']?></td>
      <td> <?= $bid['user_name'] ?></td>
      <td> <?= $bid['user_login'] ?></td>
      <td> <?= $bid['user_email'] ?></td>
    
      <td>
        <div class="col-12 "> 
        <a href="?id=<?= $bid['id'] ?>" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#infoModal<?= $bid['id'] ?>"><i class="fa fa-info" aria-hidden="true"></i></a>&nbsp
        <?php if ($isAuthenticated  && !$RoleUser): ?>
  
        <a href="?id=<?= $bid['id'] ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $bid['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp
      <a href="?id=<?= $bid['id'] ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal<?= $bid['id'] ?>"> <i class="fa fa-pencil-square" aria-hidden="true"></i></a>
    </div>
    </td>
   

    <?php endif; ?>
    </tr>





    <!-- Modal edit -->
<div class="modal fade" id="editModal<?= $bid['id'] ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Изменить заявку</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="?id=<?= $bid['id'] ?>" method="post">
     <div class="mb-3">
    <label for="name" class="form-label name">Имя</label>
    <input type="text" class="form-control name" id="name" name="name" aria-describedby="name" value="<?= $bid['name'] ?>"  required>
    </div>
    <div class="mb-3">
    <label for="phone" class="form-label phone">Телефон</label>
    <input type="tel" class="form-control phone" id="phone"  name="phone" aria-describedby="phone" value="<?= $bid['phone'] ?>"  required>
    </div>
     <div class="mb-3">
    <label for="email" class="form-label email">Адрес электронной почты</label>
    <input type="email" class="form-control email" id="email"  name="email" aria-describedby="emailHelp" value="<?= $bid['email'] ?>"  required>
  
  </div>

  <div class="mb-3">
  <label for="comment" class="form-label">Комментарий</label>
  <textarea class="form-control comment" id="comment"  name="comment" rows="3"></textarea>
</div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Отмена</button>
        <button type="submit" class="btn btn-primary" name="edit" >Изменить</button>
      </div> </form>
    </div>
  </div>

</div>



    <!-- Modal delete -->
    <div class="modal fade" id="deleteModal<?= $bid['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      <form action="?id=<?= $bid['id'] ?>" method="post">
      <input type="hidden" name="id" value="<?= $bid['id'] ?>">
        <h1 class="modal-title fs-5" id="deleteModalLabel">Удалить заявку</h1>
    
    
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="submit" class="btn btn-primary" name="delete" >Удалить</button>
      </div> </form>
    </div>
  </div>

</div>



  <!-- Modal info -->
  <div class="modal fade" id="infoModal<?= $bid['id'] ?>" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editModalLabel">Заявка №<?= $bid['id'] ?></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">


      <div class="card col-md-8 offset-md-2"  style="width: 18rem; border: none;">


      <ul class="list-group list-group-flush">
  <li class="list-group-item">Имя: <?= $bid['name'] ?></li>
  <li class="list-group-item">Email: <?= $bid['email'] ?></li>
  <li class="list-group-item">Телефон: <?= $bid['phone'] ?></li>
  <li class="list-group-item">Комментарий: <?= $bid['comment'] ?></li>
  
</ul>

</div>
 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>

      </div> </div>
    </div>
  </div>

</div>
       
   
    <?php endforeach; ?>
    <?php else: ?>
            <li>Нет доступных заявок.</li>
      
  </tbody> 
   <?php endif; ?>
</table>
</div>

<!-- Modal create -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addModalLabel">Создать заявку</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     <form action="index.php" method="post">
     <div class="mb-3">
    <label for="name" class="form-label name">Тема обращения</label>
    <input type="text" class="form-control name" id="name" name="name" aria-describedby="name">
    </div>
  

  <div class="mb-3">
  <label for="comment" class="form-label">Комментарий</label>
  <textarea class="form-control comment" id="comment"  name="comment" rows="3"></textarea>
</div>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="submit" class="btn btn-primary" name="add">Добавить</button>
      </div> </form>
    </div>
  </div>

</div>
       