<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="ChangeGrades")
 */
class ChangeGrade {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $changeGradeId;

    /**
     * @ORM\Column(type="string")
     */
    protected $motive;

    /**
     * @ORM\Column(type="integer")
     */
    protected $period;

    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    /**
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="changeGrades")
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
     * Get changeGradeId
     *
     * @return integer
     */
    public function getChangeGradeId()
    {
        return $this->changeGradeId;
    }

    
    /**
     * Set motive
     *
     * @param string $motive
     * @return ChangeGrade
     */
    public function setMotive($motive)
    {
        $this->motive = $motive;

        return $this;
    }

    /**
     * Get motive
     *
     * @return string
     */
    public function getMotive()
    {
        return $this->motive;
    }

    
    /**
     * Set period
     *
     * @param integer $period
     * @return ChangeGrade
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return integer
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
     * @return ChangeGrade
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
        return $this;
    }

}