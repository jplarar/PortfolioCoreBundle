<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="SubjectDropouts")
 */
class SubjectDropout {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $subjectDropoutId;

    /**
     * @ORM\Column(type="string")
     */
    protected $motive;

    /**
     * @ORM\Column(type="string")
     */
    protected $period;

    /**
     * @ORM\Column(type="string")
     */
    protected $courseCode;

    /**
     * @ORM\Column(type="string")
     */
    protected $courseName;

    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    /**
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="subjectDropouts")
     * @ORM\JoinColumn(name="studentId", referencedColumnName="studentId", nullable=false, onDelete="CASCADE")
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
     * Get subjectDropoutId
     *
     * @return integer
     */
    public function getSubjectDropoutId()
    {
        return $this->subjectDropoutId;
    }

    /**
     * Set motive
     *
     * @param string $motive
     * @return SubjectDropout
     */
    public function setMotive($motive)
    {
        $this->motive = $motive;
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
     * @param string $period
     * @return SubjectDropout
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
     * @return SubjectDropout
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
        return $this;
    }

    /**
     * Get CourseCode
     * @return string
     */
    public function getCourseCode()
    {
        return $this->courseCode;
    }

    /**
     * Set CourseCode
     * @param string $courseCode
     * @return SubjectDropout
     */
    public function setCourseCode($courseCode)
    {
        $this->courseCode = $courseCode;
        return $this;
    }

    /**
     * Get CourseName
     * @return string
     */
    public function getCourseName()
    {
        return $this->courseName;
    }

    /**
     * Set CourseName
     * @param string $courseName
     * @return SubjectDropout
     */
    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;
        return $this;
    }

}