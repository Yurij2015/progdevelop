<?php
/**
 * Created by PhpStorm.
 * File: request.php
 * Date: 2019-02-27
 * Time: 02:17
 */
session_start();
require_once '../Session.php';
//проверка, авторизирован ли пользователь
if (!Session::has('email')) {
    //перенаправление на форму авторизации
    header('Location: ../login.php?msg=У Вас нет доступа к сайту. Войдите на сайт!');
}
?>
<?php $title = "Заявки на услуги" ?>
<?php
require_once('../Dbsettings.php');
include_once('../DB.php');
$db = new DB($host, $user, $password, $db_name);
?>
<?php include 'header.php' ?>
    <h6 style="color: red; line-height: 20px;"
        class="text-center"><?= isset($_GET['msg']) ? $_GET['msg'] : ''; ?></h6>
    <hr>
    <h6 align="right">Система приема заказов</h6>
    <hr>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <h5 class="text-center border border-top-0 border-left-0" style="line-height: 40px;">Меню</h5>
            </div>
            <div class="col-sm">
                <h5 class="text-center border border-top-0 border-right-0"
                    style="line-height: 40px;"><?php echo $title ?></h5>
            </div>
        </div>
        <div class="row">
            <?php include_once('../navigation.php'); ?>
            <div class="col-sm">
                <div class="text-justify border border-bottom-0 border-right-0"
                     style="line-height: 40px; padding-left: 10px; padding-right: 10px;">
                    <div style="margin: 4px 0 7px 0;">
                        <a href="request-add.php" class="btn btn-info">Добавить заявку</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">ID заявки</th>
                            <th scope="col" class="text-center">Дата создания</th>
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
                                <td><?php echo $applformitem["date"]; ?></td>
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