<?php
require_once('ActionController.php');
require_once('Db.php');
require_once('Bid.php');
require_once('User.php');
set_time_limit(120);
session_start();
$db = new Db();

$actionController = new ActionController($db);
$actionController->actionInsert();
$actionController->actionUpdate();
$actionController->actionDelete();
$actionController->actionUpdateUser();
$actionController->actionDeleteUser();

$actionController->actionRegistration();
$actionController->actionAuthorization();
$actionController->actionLogout();
$bid = new Bid($db);
$bids = $bid->read();
$user = new User($db);
$users = $user->readUser();
$isAuthenticated = isset($_SESSION['user_id']);

$RoleUser = isset($_SESSION['role']) && $_SESSION['role'] == 'user';
