<div class="content">
  <h1 class="title text-center mt-5">Пользователи</h1>
  <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-5">
    <button class="btn btn-outline-success me-md-2" type="button" data-bs-toggle="modal" data-bs-target="#addModalUser">Создать пользователя</button>
  </div>
  <div class="mb-5 "></div>
  <?php if (!empty($users)): ?>
    <table class="table table-hover mt-5">
      <thead>
        <tr class="text">
          <th scope="col">ID</th>
          <th scope="col">ЛОГИН</th>
          <th scope="col">ИМЯ</th>
          <th scope="col">НОМЕР</th>
          <th scope="col">EMAIL</th>
          <th scope="col">ДЕЙСТВИЕ</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($users as $user): ?>
          <tr class="text">
            <td><?= $user['id'] ?></td>
            <td><?= $user['login'] ?></td>
            <td> <?= $user['name'] ?></td>
            <td><?= $user['phone'] ?></td>
            <td><?= $user['email'] ?></td>
            <td>
              <div class="col-12 text">
                <a href="?id=<?= $user['id'] ?>" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#infoModalUser<?= $user['id'] ?>"><i class="fa fa-info" aria-hidden="true"></i></a>&nbsp
                <a href="?id=<?= $user['id'] ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModalUser<?= $user['id'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>&nbsp
                <a href="?id=<?= $user['id'] ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModalUser<?= $user['id'] ?>"> <i class="fa fa-pencil-square" aria-hidden="true"></i></a>
              </div>
            </td>
          </tr>

          <!-- Modal edit -->
          <div class="modal fade" id="editModalUser<?= $user['id'] ?>" tabindex="-1" aria-labelledby="editModalLabelUser" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="editModalLabelUser">Изменить пользователя</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form action="?id=<?= $user['id'] ?>" method="post">
                    <div class="mb-3">
                      <label for="name" class="form-label name">Имя</label>
                      <input type="text" class="form-control name" id="name" name="name" aria-describedby="name" value="<?= $user['name'] ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="login" class="form-label login">Логин</label>
                      <input type="text" class="form-control login" id="login" name="login" aria-describedby="login" value="<?= $user['login'] ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="phone" class="form-label phone">Телефон</label>
                      <input type="tel" class="form-control phone" id="phone" name="phone" aria-describedby="phone" value="<?= $user['phone'] ?>" required>
                    </div>
                    <div class="mb-3">
                      <label for="email" class="form-label email">Адрес электронной почты</label>
                      <input type="email" class="form-control email" id="email" name="email" aria-describedby="emailHelp" value="<?= $user['email'] ?>" required>
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                  <button type="submit" class="btn btn-primary" name="editUser">Изменить</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal delete -->
          <div class="modal fade" id="deleteModalUser<?= $user['id'] ?>" tabindex="-1" aria-labelledby="deleteModalLabelUser" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <form action="?id=<?= $user['id'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <h1 class="modal-title fs-5" id="deleteModalLabelUser">Удалить пользователя</h1>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                  <button type="submit" class="btn btn-primary" name="deleteUser">Удалить</button>
                </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Modal info -->
          <div class="modal fade" id="infoModalUser<?= $user['id'] ?>" tabindex="-1" aria-labelledby="infoModalLabelUser" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="editModalLabelUser">Пользователь №<?= $user['id'] ?></h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="card col-md-8 offset-md-2" style="width: 18rem; border: none;">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item">Имя: <?= $user['name'] ?></li>
                      <li class="list-group-item">Логин: <?= $user['login'] ?></li>
                      <li class="list-group-item">Email: <?= $user['email'] ?></li>
                      <li class="list-group-item">Телефон: <?= $user['phone'] ?></li>
                    </ul>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
                </div>
              </div>
            </div>
          </div>
</div>
<?php endforeach; ?>
<?php else: ?>
  <li>Нет доступных пользователей.</li>
  </tbody>
<?php endif; ?>
</table>
</div>

<!-- Modal create -->
<div class="modal fade" id="addModalUser" tabindex="-1" aria-labelledby="addModalLabelUser" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addModalLabelUser">Создать заявку</h1>
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
            <input type="text" class="form-control login" id="login" name="login" aria-describedby="login" placeholder="login">
          </div>
          <div class="mb-3">
            <label for="phone" class="form-label phone">Телефон</label>
            <input type="tel" class="form-control phone" id="phone" name="phone" aria-describedby="phone" placeholder="89219999999">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label email">Адрес электронной почты</label>
            <input type="email" class="form-control email" id="email" name="email" aria-describedby="emailHelp" placeholder="mail@mail.com">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label password">Пароль</label>
            <input type="password" class="form-control password" id="password" name="password" aria-describedby="password" placeholder="parol2443">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Отмена</button>
        <button type="submit" class="btn btn-primary" name="addUser">Добавить</button>
      </div>
      </form>
    </div>
  </div>
</div>