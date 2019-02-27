<?php
/**
 * Created by PhpStorm.
 * File: ApplicationForm.php
 * Date: 2019-02-27
 * Time: 10:41
 */

class ApplicationForm
{

    private $applname;
    private $date;
    private $service_idservice;
    private $customer_idcustomer;
    private $employee_idemployee;
    private $info;


    /**
     * @param array $data
     */
    function __construct(Array $data)
    {
        $this->applname = isset($data['applname']) ? $data['applname'] : null;
        $this->date = isset($data['date']) ? $data['date'] : null;
        $this->service_idservice = isset($data['service_idservice']) ? $data['service_idservice'] : null;
        $this->customer_idcustomer = isset($data['customer_idcustomer']) ? $data['customer_idcustomer'] : null;
        $this->employee_idemployee = isset($data['employee_idemployee']) ? $data['employee_idemployee'] : null;
        $this->info = isset($data['info']) ? $data['info'] : null;

    }

    public function validate()
    {
        return !empty($this->applname) && !empty($this->date) && !empty($this->service_idservice) && !empty($this->customer_idcustomer) && !empty($this->employee_idemployee) && !empty($this->info);
    }

    /**
     * @return mixed
     */
    public function getApplName()
    {
        return $this->applname;
    }

    /**
     * @param mixed $applname
     */
    public function setApplName($applname)
    {
        $this->applname = $applname;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getService_idservice()
    {
        return $this->service_idservice;
    }

    /**
     * @param mixed $service_idservice
     */
    public function setService_idservice($service_idservice)
    {
        $this->service_idservice = $service_idservice;
    }

    /**
     * @return mixed
     */
    public function getCustomer_idcustomer()
    {
        return $this->customer_idcustomer;
    }

    /**
     * @param mixed $customer_idcustomer
     */
    public function setCustomer_idcustomer($customer_idcustomer)
    {
        $this->customer_idcustomer = $customer_idcustomer;
    }

    /**
     * @return mixed
     */
    public function getEmployee_idemployee()
    {
        return $this->employee_idemployee;
    }

    /**
     * @param mixed $employee_idemployee
     */
    public function setEmployee_idemployee($employee_idemployee)
    {
        $this->employee_idemployee = $employee_idemployee;
    }

    /**
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * @param mixed $info
     */
    public function setInfo($info)
    {
        $this->info = $info;
    }


}