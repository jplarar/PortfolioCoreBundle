<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="SocialServices")
 */
class SocialService {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $socialServiceId;

    /**
     * @ORM\Column(type="string")
     */
    protected $period;

    /**
     * @ORM\Column(type="string")
     */
    protected $campus;

    /**
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @ORM\Column(type="string")
     */
    protected $company;

    /**
     * @ORM\Column(type="integer")
     */
    protected $registeredHours;

    /**
     * @ORM\Column(type="integer")
     */
    protected $accreditedHours;

    /**
     * @ORM\Column(type="string")
     */
    protected $status;

    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    /**
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="socialServices")
     * @ORM\JoinColumn(name="studentId", referencedColumnName="studentId", nullable=false)
     */
    protected $studentId;

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

    /**
     * Get socialServiceId
     *
     * @return integer
     */
    public function getSocialServiceId()
    {
        return $this->socialServiceId;
    }

    /**
     * Set period
     *
     * @param string $period
     * @return SocialService
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
     * Set campus
     *
     * @param string $campus
     * @return SocialService
     */
    public function setCampus($campus)
    {
        $this->campus = $campus;

        return $this;
    }

    /**
     * Get campus
     *
     * @return string
     */
    public function getCampus()
    {
        return $this->campus;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return SocialService
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
     * Set company
     *
     * @param string $company
     * @return SocialService
     */
    public function setCompany($company)
    {
        $this->company = $company;

    /**
     * Get StudentId
     * @return Student
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * Set StudentId
     * @param Student $studentId
     * @return SocialService
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
        return $this;
    }

    /**
     * Get company
     *
     * @return string
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set registeredHours
     *
     * @param integer $registeredHours
     * @return SocialService
     */
    public function setRegisteredHours($registeredHours)
    {
        $this->registeredHours = $registeredHours;

        return $this;
    }

    /**
     * Get registeredHours
     *
     * @return integer
     */
    public function getRegisteredHours()
    {
        return $this->registeredHours;
    }

    /**
     * Set accreditedHours
     *
     * @param integer $accreditedHours
     * @return SocialService
     */
    public function setAccreditedHours($accreditedHours)
    {
        $this->accreditedHours = $accreditedHours;

        return $this;
    }

    /**
     * Get accreditedHours
     *
     * @return integer
     */
    public function getAccreditedHours()
    {
        return $this->accreditedHours;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return SocialService
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