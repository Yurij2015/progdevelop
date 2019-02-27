<?php
/**
 * Created by PhpStorm.
 * File: request-add.php
 * Date: 2019-02-27
 * Time: 16:59
 */
session_start();
require_once('../Session.php');
//проверка, авторизирован ли пользователь
if (!Session::has('email')) {
    //перенаправление на форму авторизации
    header('Location: ../login.php?msg=У Вас нет доступа к сайту. Войдите на сайт!');
}
$title = "Добавление заявки";
require_once('../forms/ApplicationForm.php');
require_once('../DB.php');
require_once('../Password.php');
require_once('../Dbsettings.php');
$msg = '';
$db = new DB($host, $user, $password, $db_name);
$form = new ApplicationForm($_POST);
if ($_POST) {
    if ($form->validate()) {
        $applname = $db->escape($form->getApplName());
        $date = $db->escape($form->getDate());
        $service_idservice = $db->escape($form->getService_idservice());
        $customer_idcustomer = $db->escape($form->getCustomer_idcustomer());
        $employee_idemployee= $db->escape($form->getEmployee_idemployee());
        $info = $db->escape($form->getInfo());
        $db->query("INSERT INTO applicationForm (applname, `date`, service_idservice, customer_idcustomer, employee_idemployee, info) VALUES ('{$applname}','{$date}','{$service_idservice}','{$customer_idcustomer}','{$employee_idemployee}', '{$info}') ");
        header('location: request.php?msg=Заявка успешно добавлена!');
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
                        <label for="applname">Идентификатор заявки</label>
                        <input type="text" class="form-control" id="applname" placeholder="Идентификатор заявки"
                               name="applname"
                               value="<?= $form->getApplName(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="date">Дата создания заявки</label>
                        <input type="date" class="form-control" id="date" placeholder="Дата создания заявки"
                               name="date"
                               value="<?= $form->getDate(); ?>">
                    </div>

                    <div class="form-group">
                        <label for="service_idservice">Наименование услуги</label>
                        <select class="form-control" name="service_idservice" id="service_idservice">
                            <?php
                            $service = $db->query("SELECT idservice, servicename FROM service");
                            foreach ($service as $serviceitem) {
                                ?>
                                <option value="<?php echo $serviceitem['idservice'] ?>"><?php echo $serviceitem['servicename'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="customer_idcustomer">Клиент</label>
                        <select class="form-control" name="customer_idcustomer" id="customer_idcustomer">
                            <?php
                            $customer = $db->query("SELECT idcustomer, custname FROM customer");
                            foreach ($customer as $customeritem) {
                                ?>
                                <option value="<?php echo $customeritem['idcustomer'] ?>"><?php echo $customeritem['custname'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employee_idemployee">Оформил сотрудник</label>
                        <select class="form-control" name="employee_idemployee" id="employee_idemployee">
                            <?php
                            $employee = $db->query("SELECT idemployee, employename FROM employee");
                            foreach ($employee as $employeeitem) {
                                ?>
                                <option value="<?php echo $employeeitem['idemployee'] ?>"><?php echo $employeeitem['employename'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="info">Дата создания заявки</label>
                        <input type="text" class="form-control" id="info" placeholder="Дополнительная информация"
                               name="info"
                               value="<?= $form->getInfo(); ?>">
                    </div>

                    <button type="submit" class="btn btn-info">Сохранить</button>
                    <a href="request.php" class="btn btn-info">Отмена</a>

                </form>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
