<?php
/**
 * Created by PhpStorm.
 * File: ServiceForm.php
 * Date: 2019-02-27
 * Time: 10:40
 */

class ServiceForm
{

    public $servicename;
    public $cost;
    public $description;

    /**
     * @param array $data
     */
    function __construct(Array $data)
    {
        $this->servicename = isset($data['servicename']) ? $data['servicename'] : null;
        $this->cost = isset($data['cost']) ? $data['cost'] : null;
        $this->description = isset($data['description']) ? $data['description'] : null;

    }

    public function validate()
    {
        return !empty($this->servicename) && !empty($this->cost) && !empty($this->description) ;
    }

    /**
     * @return mixed
     */
    public function getServicename()
    {
        return $this->servicename;
    }

    /**
     * @param mixed $servicename
     */
    public function setServicename($servicename)
    {
        $this->servicename = $servicename;
    }

    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

}