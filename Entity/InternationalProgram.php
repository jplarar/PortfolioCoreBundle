<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="InternationalPrograms")
 */
class InternationalProgram {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $internationalProgramId;

    /**
     * @ORM\Column(type="string")
     */
    protected $university;

    /**
     * @ORM\Column(type="string")
     */
    protected $country;

    /**
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @ORM\Column(type="string")
     */
    protected $period;

    /**
     * @ORM\Column(type="string")
     */
    protected $status;

    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    // none.

    #########################
    ##      CONSTRUCTOR    ##
    #########################

    // none.

    #########################
    ##   SPECIAL METHODS   ##
    #########################

    // none.

    #########################
    ## GETTERs AND SETTERs ##
    #########################

    // none.
    /**
     * Get internationalProgramId
     *
     * @return integer
     */
    public function getInternationalProgramId()
    {
        return $this->internationalProgramId;
    }

    /**
     * Set university
     *
     * @param string $university
     * @return InternationalProgram
     */
    public function setUniversity($university)
    {
        $this->university = $university;

        return $this;
    }

    /**
     * Get university
     *
     * @return string
     */
    public function getUniversity()
    {
        return $this->university;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return InternationalProgram
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return InternationalProgram
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set period
     *
     * @param string $period
     * @return InternationalProgram
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return string
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return InternationalProgram
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

}