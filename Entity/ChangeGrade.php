<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * This object is also used to represent the student courses
 *
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
     * @ORM\Column(type="string")
     */
    protected $period;

    /**
     * @ORM\Column(type="integer")
     */
    protected $semester;

    /**
     * @ORM\Column(type="integer")
     */
    protected $grade;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $newGrade;

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
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="changeGrades")
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
     * Set semester
     *
     * @param integer $semester
     * @return ChangeGrade
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
     * Set grade
     *
     * @param integer $grade
     * @return ChangeGrade
     */
    public function setGrade($grade)
    {
        $this->grade = $grade;

        return $this;
    }

    /**
     * Get grade
     *
     * @return integer
     */
    public function getGrade()
    {
        return $this->grade;
    }

    /**
     * Set newGrade
     *
     * @param integer $newGrade
     * @return ChangeGrade
     */
    public function setNewGrade($newGrade)
    {
        $this->newGrade = $newGrade;

        return $this;
    }

    /**
     * Get newGrade
     *
     * @return integer
     */
    public function getNewGrade()
    {
        return $this->newGrade;
    }

    /**
     * Get StudentId
     * @return string
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

    /**
     * Get CourseId
     * @return string
     */
    public function getCourseCode()
    {
        return $this->courseCode;
    }

    /**
     * Set CourseCode
     * @param string $courseCode
     * @return ChangeGrade
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
     * @return ChangeGrade
     */
    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;
        return $this;
    }

}