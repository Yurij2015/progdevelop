<?php
/**
 * Created by PhpStorm.
 * File: customer-add.php
 * Date: 2019-02-27
 * Time: 14:25
 */
session_start() ?>
<?php $title = "Добавление клиента" ?>
<?php
require_once('../forms/CustomerForm.php');
require_once('../DB.php');
require_once('../Password.php');
require_once('../Session.php');
require_once('../Dbsettings.php');
$msg = '';
$db = new DB($host, $user, $password, $db_name);
$form = new CustomerForm($_POST);
if ($_POST) {
    if ($form->validate()) {
        $custname = $db->escape($form->getCustName());
        $phone = $db->escape($form->getPhone());
        $db->query("INSERT INTO customer (custname, phone) VALUES ('{$custname}','{$phone}' ) ");
        header('location: customer.php?msg=Клиента успешно добавлен!');
    } else {
        $msg = 'Пожалуйста, заполните все поля';
    }
}
?>
<?php include 'header.php' ?>
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
                <b style="color: red;"><?= $msg; ?></b>
                <form method="post">
                    <div class="form-group">
                        <label for="name">Имя клиента</label>
                        <input type="text" class="form-control" id="name" placeholder="Имя клиента"
                               name="custname"
                               value="<?= $form->getCustName(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="secondname">Номер телефона</label>
                        <input type="tel" class="form-control" id="secondname" placeholder="Номер телефона клиента"
                               name="phone" value="<?= $form->getPhone() ?>">
                    </div>
                    <button type="submit" class="btn btn-info">Сохранить</button>
                    <a href="customer.php" class="btn btn-info">Отмена</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
