<?php
/**
 * Created by PhpStorm.
 * File: CustomerForm.php
 * Date: 2019-02-27
 * Time: 10:35
 */

class CustomerForm
{

    private $custname;
    private $phone;


    /**
     * @param array $data
     */
    function __construct(Array $data)
    {
        $this->custname = isset($data['custname']) ? $data['custname'] : null;
        $this->phone = isset($data['phone']) ? $data['phone'] : null;

    }

    public function validate()
    {
        return !empty($this->custname) && !empty($this->phone);
    }

    /**
     * @return mixed
     */
    public function getCustName()
    {
        return $this->custname;
    }

    /**
     * @param mixed $custname
     */
    public function setCustName($custname)
    {
        $this->custname = $custname;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

}