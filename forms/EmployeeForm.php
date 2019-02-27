<?php
/**
 * Created by PhpStorm.
 * Date: 19.02.2019
 * Time: 11:12
 */

class EmployeeForm
{
    private $employename;
    private $position_idposition;


    /**
     * @param array $data
     */
    function __construct(Array $data)
    {
        $this->employename = isset($data['employename']) ? $data['employename'] : null;
        $this->position_idposition = isset($data['position_idposition']) ? $data['position_idposition'] : null;

    }

    public function validate()
    {
        return !empty($this->employename) && !empty($this->position_idposition);
    }

    /**
     * @return mixed
     */
    public function getEmployeeName()
    {
        return $this->employename;
    }

    /**
     * @param mixed $employename
     */
    public function setEmployeeName($employename)
    {
        $this->employename = $employename;
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position_idposition;
    }

    /**
     * @param mixed $position
     */
    public function setPosition($position)
    {
        $this->position_idposition = $position;
    }

}