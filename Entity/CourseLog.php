<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 *
 * This object is also used to represent the student courses
 *
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="CourseLogs")
 */
class CourseLog {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $courseLogId;

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
    protected $finalGrade;

    /**
     * @ORM\Column(type="integer")
     */
    protected $firstGrade;

    /**
     * @ORM\Column(type="integer")
     */
    protected $secondGrade;

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
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="courseLogs")
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
    public function getCourseLogId()
    {
        return $this->courseLogId;
    }

    /**
     * Set period
     *
     * @param integer $period
     * @return CourseLog
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
     * @return CourseLog
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
     * Get finalGrade
     *
     * @return integer
     */
    public function getFinalGrade()
    {
        return $this->finalGrade;
    }

    /**
     * Set finalGrade
     *
     * @param integer $finalGrade
     * @return CourseLog
     */
    public function setFinalGrade($finalGrade)
    {
        $this->finalGrade = $finalGrade;

        return $this;
    }

    /**
     * Get firstGrade
     *
     * @return integer
     */
    public function getFirstGrade()
    {
        return $this->firstGrade;
    }

    /**
     * Set firstGrade
     *
     * @param integer $firstGrade
     * @return CourseLog
     */
    public function setFirstGrade($firstGrade)
    {
        $this->firstGrade = $firstGrade;

        return $this;
    }

    /**
     * Get secondGrade
     *
     * @return integer
     */
    public function getSecondGrade()
    {
        return $this->secondGrade;
    }

    /**
     * Set SecondGrade
     *
     * @param integer $secondGrade
     * @return CourseLog
     */
    public function setSecondGrade($secondGrade)
    {
        $this->secondGrade = $secondGrade;

        return $this;
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
     * @return CourseLog
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
     * @param Course $courseCode
     * @return CourseLog
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
     * @return CourseLog
     */
    public function setCourseName($courseName)
    {
        $this->courseName = $courseName;
        return $this;
    }

}