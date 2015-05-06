<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="CulturalDiffusions")
 */
class CulturalDiffusion {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $culturalDiffusionId;

    /**
     * @ORM\Column(type="string")
     */
    protected $activity;

    /**
     * @ORM\Column(type="string")
     */
    protected $role;

    /**
     * @ORM\Column(type="string")
     */
    protected $period;

    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    /**
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="culturalDiffusions")
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

    // none.
   /**
     * Get culturalDiffusionId
     *
     * @return integer
     */
    public function getCulturalDiffusionId()
    {
        return $this->culturalDiffusionId;
    }

    
    /**
     * Set activity
     *
     * @param string $activity
     * @return CulturalDiffusion
     */
    public function setActivity($activity)
    {
        $this->activity = $activity;

        return $this;
    }

    /**
     * Get activity
     *
     * @return string
     */
    public function getActivity()
    {
        return $this->activity;
    }

    
    /**
     * Set role
     *
     * @param string $role
     * @return CulturalDiffusion
     */
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

     /**
     * Set period
     *
     * @param string $period
     * @return CulturalDiffusion
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
     * @return CulturalDiffusion
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
        return $this;
    }
}