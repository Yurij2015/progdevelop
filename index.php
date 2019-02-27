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
                        <th scope="col" class="text-center">ID заявки</th>
<!--                        <th scope="col" class="text-center">Дата создания</th>-->
                        <th scope="col" class="text-center">Услуга</th>
                        <th scope="col" class="text-center">Клиент</th>
                        <th scope="col" class="text-center">Принял заявку</th>
                        <th scope="col" class="text-center">Детали</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    try {
                    $db = new DB($host, $user, $password, $db_name);
                    $applicationForm = $db->query("SELECT * FROM applicationForm, service, customer, employee WHERE applicationForm.service_idservice = service.idservice AND applicationForm.customer_idcustomer = customer.idcustomer AND applicationForm.employee_idemployee = employee.idemployee");
                    foreach ($applicationForm as $applformitem) {
                        ?>
                        <tr>
                            <td><?php echo $applformitem["applname"]; ?></td>
<!--                            <td>--><?php //echo $applformitem["date"]; ?><!--</td>-->
                            <td><?php echo $applformitem["servicename"]; ?></td>
                            <td><?php echo $applformitem["custname"]; ?></td>
                            <td><?php echo $applformitem["employename"]; ?></td>
                            <td><?php echo $applformitem["info"]; ?></td>
                        </tr>
                    <?php }
                    ?>
                    </tbody>
                </table>
                <?php
                } catch
                (Exception $e) {
                    echo $e->getMessage() . ':(';
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
