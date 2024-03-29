<?php
session_start()
/**
 * Created by PhpStorm.
 * File: position-add.php.
 * Date: 2019-02-27
 * Time: 13:43
 */
?>
<?php $title = "Добавление должности" ?>
<?php
require_once('../forms/PositionForm.php');
//require_once ('forms/LoginForm.php');
require_once('../DB.php');
require_once('../Password.php');
require_once('../Session.php');
require_once('../Dbsettings.php');
$msg = '';
$db = new DB($host, $user, $password, $db_name);
$form = new PositionForm($_POST);
if ($_POST) {
    if ($form->validate()) {
        $positionname= $db->escape($form->getPosition());
        $db->query("INSERT INTO position (`positionname`) VALUES ('{$positionname}') ");
        header('location: position.php?msg=Должность успешно добавлена!');
    } else {
        $msg = 'Пожалуйста, заполните все поля';
    }
}
?>
<?php
include 'header.php';
include 'var.php';
?>
<hr>
<h6 align="right"><?php echo $system_name ?></h6>
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
                        <label for="positionname">Название должности</label>
                        <input type="text" class="form-control" id="positionname" placeholder="Название должности"
                               name="positionname"
                               value="<?= $form->getPosition(); ?>">
                    </div>
                    <button type="submit" class="btn btn-info">Сохранить</button>
                    <a href="unit.php" class="btn btn-info">Отмена</a>

                </form>
            </div>
        </div>
    </div>

</div>


<?php include 'footer.php' ?>
