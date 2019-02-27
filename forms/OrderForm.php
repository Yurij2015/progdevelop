<?php
/**
 * Created by PhpStorm.
 * File: OrderForm.php
 * Date: 2019-02-27
 * Time: 10:39
 */

class OrderForm
{

    public $date;
    public $applicationForm_idapplicationForm;
    public $status;

    /**
     * @param array $data
     */
    function __construct(Array $data)
    {
        $this->date = isset($data['date']) ? $data['date'] : null;
        $this->applicationForm_idapplicationForm = isset($data['applicationForm_idapplicationForm']) ? $data['applicationForm_idapplicationForm'] : null;
        $this->status = isset($data['status']) ? $data['status'] : null;
    }

    public function validate()
    {
        return !empty($this->positionname) && !empty($this->applicationForm_idapplicationForm && !empty($this->status));
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
    public function getApplicationForm_idapplicationForm()
    {
        return $this->applicationForm_idapplicationForm;
    }

    /**
     * @param mixed $applicationForm_idapplicationForm
     */
    public function setApplicationForm_idapplicationForm($applicationForm_idapplicationForm)
    {
        $this->applicationForm_idapplicationForm = $applicationForm_idapplicationForm;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }
}