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
    protected $grade;

    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    /**
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="courseLogs")
     * @ORM\JoinColumn(name="studentId", referencedColumnName="studentId", nullable=false)
     */
    protected $studentId;

    /**
     * @ORM\ManyToOne(targetEntity="Course", inversedBy="courseLogs")
     * @ORM\JoinColumn(name="courseId", referencedColumnName="courseId", nullable=false)
     */
    protected $courseId;

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
        return $this->changeGradeId;
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
     * Set grade
     *
     * @param integer $grade
     * @return CourseLog
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
     * @return Course
     */
    public function getCourseId()
    {
        return $this->courseId;
    }

    /**
     * Set CourseId
     * @param Course $courseId
     * @return CourseLog
     */
    public function setCourseId($courseId)
    {
        $this->courseId = $courseId;
        return $this;
    }

}