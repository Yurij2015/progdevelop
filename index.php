<?php
session_start();
require_once 'Session.php';
?>
<?php
//проверка, авторизирован ли пользователь
if (!Session::has('email')) {
    //$msg = 'У Вас нет доступа к сайту. Войдите на сайт!';
    //перенаправление на форму авторизации
    header('Location: login.php?msg=У Вас нет доступа к сайту. Войдите на сайт!');
}
?>
<?php $title = "Главная страница" ?>
<?php
require_once('Dbsettings.php');
include_once('DB.php');
$db = new DB($host, $user, $password, $db_name);
?>
<?php include 'header.php' ?>
<?= isset($_GET['msg']) ? $_GET['msg'] : ''; ?>
<hr>
<h5 align="center">Система приема заказов</h5>
<hr>
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <h5 class="text-center border border-top-0 border-left-0" style="line-height: 40px;">Меню</h5>
        </div>
        <div class="col-sm">
            <h5 class="text-center border border-top-0 border-right-0" style="line-height: 40px;">Новые заказы</h5>
        </div>
    </div>
    <div class="row">
        <?php include_once('navigation.php'); ?>
        <div class="col-sm">
            <div class="text-justify border border-bottom-0 border-right-0"
                 style="line-height: 40px; padding-left: 10px; padding-right: 10px;">
                <p style="line-height: 30px; margin-bottom: 5px">Список новых заявок</p>
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Услуга</th>
                        <th scope="col">Клиент</th>
                        <th scope="col">Менеджер</th>
                        <th scope="col">Детали</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    for ($i = 0; $i < 14; $i++) {
                        echo "<tr>
                            <th scope=\"row\">$i</th>
                            <td>$i - 1</td>
                            <td>$i - 2</td>
                            <td>$i - 3</td>
                            <td>$i - detail</td>
                           </tr>";
                    }
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
