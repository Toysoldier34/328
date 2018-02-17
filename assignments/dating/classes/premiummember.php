<?php

/**
 * Date: 2/16/2018
 * @author Tony Thompson
 * @version 1.0
 * class for premium members
 */

Class PremiumMember extends Member{

    protected $indoor = array();
    protected $outdoor = array();






    /********  SETTERS GETTERS  ********/

    /**
     * @return mixed
     */
    public function getIndoor()
    {
        return $this->indoor;
    }

    /**
     * @param mixed $indoor
     */
    public function setIndoor($indoor)
    {
        $this->indoor = $indoor;
    }

    /**
     * @return mixed
     */
    public function getOutdoor()
    {
        return $this->outdoor;
    }

    /**
     * @param mixed $outdoor
     */
    public function setOutdoor($outdoor)
    {
        $this->outdoor = $outdoor;
    }

}//end class premiumMember