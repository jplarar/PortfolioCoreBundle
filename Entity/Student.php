<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="Students")
 */
class Student {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $studentId;

    /**
     * @ORM\Column(type="string")
     */
    protected $fullName;

    /**
     * @ORM\Column(type="integer")
     */
    protected $semester;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $localAddress;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $foreignAddress;

    /**
     * @ORM\Column(type="string")
     */
    protected $telephone;

    /**
     * @ORM\Column(type="string")
     */
    protected $career;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $admissionDate;

    /**
     * @ORM\Column(type="string")
     */
    protected $status;

    /**
     * grade point average
     *
     * @ORM\Column(type="string")
     */
    protected $gpa;

    /**
     * @ORM\Column(type="integer")
     */
    protected $units;

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
     * Get studentId
     *
     * @return integer
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     * @return Student
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set semester
     *
     * @param integer $semester
     * @return Student
     */
    public function setSemester($semester)
    {
        $this->semester = $semester;

        return $this;
    }

    /**
     * Get semester
     *
     * @return integer
     */
    public function getSemester()
    {
        return $this->semester;
    }

    /**
     * Set localAddress
     *
     * @param string $localAddress
     * @return Student
     */
    public function setLocalAddress($localAddress)
    {
        $this->localAddress = $localAddress;

        return $this;
    }

    /**
     * Get localAddress
     *
     * @return string
     */
    public function getLocalAddress()
    {
        return $this->localAddress;
    }

    /**
     * Set foreignAddress
     *
     * @param string $foreignAddress
     * @return Student
     */
    public function setForeignAddress($foreignAddress)
    {
        $this->foreignAddress = $foreignAddress;

        return $this;
    }

    /**
     * Get foreignAddress
     *
     * @return string
     */
    public function getForeignAddress()
    {
        return $this->foreignAddress;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Student
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set career
     *
     * @param string $career
     * @return Student
     */
    public function setCareer($career)
    {
        $this->career = $career;

        return $this;
    }

    /**
     * Get career
     *
     * @return string
     */
    public function getCareer()
    {
        return $this->career;
    }

    /**
     * Set admissionDate
     *
     * @param /DateTime $admissionDate
     * @return Student
     */
    public function setAdmissionDate($admissionDate)
    {
        $this->admissionDate = $admissionDate;

        return $this;
    }

    /**
     * Get admissionDate
     *
     * @return /DateTime
     */
    public function getAdmissionDate()
    {
        return $this->admissionDate;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Student
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

    /**
     * Set gpa
     *
     * @param string $gpa
     * @return Student
     */
    public function setGpa($gpa)
    {
        $this->gpa = $gpa;

        return $this;
    }

    /**
     * Get gpa
     *
     * @return string
     */
    public function getGpa()
    {
        return $this->gpa;
    }

    /**
     * Set units
     *
     * @param integer $units
     * @return Student
     */
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get units
     *
     * @return integer
     */
    public function getUnits()
    {
        return $this->units;
    }

}