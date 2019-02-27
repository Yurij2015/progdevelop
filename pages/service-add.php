<?php
/**
 * Created by PhpStorm.
 * File: service-add.php
 * Date: 2019-02-27
 * Time: 14:48
 */
session_start() ?>
<?php $title = "Добавление услуги" ?>
<?php
require_once('../forms/ServiceForm.php');
require_once('../DB.php');
require_once('../Password.php');
require_once('../Session.php');
require_once('../Dbsettings.php');
$msg = '';
$db = new DB($host, $user, $password, $db_name);
$form = new ServiceForm($_POST);
if ($_POST) {
    if ($form->validate()) {
        $servicename = $db->escape($form->getServicename());
        $cost = $db->escape($form->getCost());
        $description = $db->escape($form->getDescription());
        $db->query("INSERT INTO service (servicename, cost, description) VALUES ('{$servicename}','{$cost}', '{$description}') ");
        header('location: service.php?msg=Услуга успешно добавлена!');
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
                        <label for="name">Название услуги</label>
                        <input type="text" class="form-control" id="servicename" placeholder="Название"
                               name="servicename"
                               value="<?= $form->getServicename(); ?>">
                    </div>
                    <div class="form-group">
                        <label for="secondname">Стоимость</label>
                        <input type="tel" class="form-control" id="cost" placeholder="Стоимость"
                               name="cost" value="<?= $form->getCost() ?>">
                    </div>
                    <div class="form-group">
                        <label for="secondname">Описание услуги</label>
                        <input type="tel" class="form-control" id="description" placeholder="Описание"
                               name="description" value="<?= $form->getDescription() ?>">
                    </div>
                    <button type="submit" class="btn btn-info">Сохранить</button>
                    <a href="service.php" class="btn btn-info">Отмена</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
