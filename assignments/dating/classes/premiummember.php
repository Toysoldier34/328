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
    protected $image;






//if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
//$websiteErr = "Invalid URL";
//}



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


    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        //validates image url
        //checks that the url starts with standard http/https/ftp ://www.
        //next ensures only valid url characters of any length
        if (preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$image)) {
            $this->image = $image;
        }
    }


}//end class premiumMember