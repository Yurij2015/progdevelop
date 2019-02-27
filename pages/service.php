<?php
/**
 * Created by PhpStorm.
 * File: service.php
 * Date: 2019-02-27
 * Time: 02:21
 */
session_start();
require_once '../Session.php';
?>
<?php $title = "Услуги" ?>
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
                        <a href="service-add.php" class="btn btn-info">Добавить услугу</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th scope="col" class="text-center">Название</th>
                            <th scope="col" class="text-center">Стоимость</th>
                            <th scope="col" class="text-center">Описание</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        try {
                        $db = new DB($host, $user, $password, $db_name);
                        $service = $db->query("SELECT * FROM service");
                        foreach ($service as $serviceitem) {
                            ?>
                            <tr>
                                <td><?php echo $serviceitem["servicename"]; ?></td>
                                <td><?php echo $serviceitem["cost"]; ?></td>
                                <td><?php echo $serviceitem["description"]; ?></td>
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