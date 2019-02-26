<?php
/**
 * Created by PhpStorm.
 * File: PositionForm.php.
 * Date: 19.02.2019
 * Time: 11:32
 */

class PositionForm
{

    public $positionname;

    /**
     * @param array $data
     */
    function __construct(Array $data)
    {
        $this->positionname = isset($data['positionname']) ? $data['positionname'] : null;
    }

    public function validate()
    {
        return !empty($this->positionname);
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->positionname;
    }

    /**
     * @param mixed $positionname
     */
    public function setPosition($positionname)
    {
        $this->positionname = $positionname;
    }

}