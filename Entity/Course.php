<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="Courses")
 */
class Course {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $courseId;

    /**
     * @ORM\Column(type="integer")
     */
    protected $units;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $code;

    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    /**
     * @ORM\OneToMany(targetEntity="SubjectDropout", mappedBy="courseId")
     */
    protected $subjectDropouts;

    /**
     * @ORM\OneToMany(targetEntity="ChangeGrade", mappedBy="courseId")
     */
    protected $changeGrades;

    /**
     * @ORM\OneToMany(targetEntity="CourseLog", mappedBy="courseId")
     */
    protected $courseLogs;

    #########################
    ##      CONSTRUCTOR    ##
    #########################

    public function __construct()
    {
        $this->subjectDropouts = new ArrayCollection();
        $this->$changeGrades = new ArrayCollection();
        $this->courseLogs = new ArrayCollection();
    }

    #########################
    ##   SPECIAL METHODS   ##
    #########################

    // none.

    #########################
    ## GETTERs AND SETTERs ##
    #########################

    // none.
    /**
     * Get courseId
     *
     * @return integer
     */
    public function getCourseId()
    {
        return $this->courseId;
    }

    
    /**
     * Set units
     *
     * @param integer $units
     * @return Course
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

    /**
     * Set name
     *
     * @param string $name
     * @return Course
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Course
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add SubjectDropout
     *
     * @param SubjectDropout $subjectDropout
     * @return Course
     */
    public function addSubjectDropout(SubjectDropout $subjectDropout)
    {
        $this->subjectDropouts[] = $subjectDropout;
        return $this;
    }

    /**
     * Remove SubjectDropout
     *
     * @param SubjectDropout $subjectDropout
     */
    public function removeSubjectDropout(SubjectDropout $subjectDropout)
    {
        $this->subjectDropouts->removeElement($subjectDropout);
    }

    /**
     * Get SubjectDropouts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubjectDropouts()
    {
        return $this->subjectDropouts;
    }

    /**
     * Add changeGrade
     *
     * @param ChangeGrade $changeGrade
     * @return Course
     */
    public function addChangeGrade(ChangeGrade $changeGrade)
    {
        $this->changeGrades[] = $changeGrade;
        return $this;
    }

    /**
     * Remove changeGrade
     *
     * @param ChangeGrade $changeGrade
     */
    public function removeChangeGrade(ChangeGrade $changeGrade)
    {
        $this->changeGrades->removeElement($changeGrade);
    }

    /**
     * Get changeGrades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChangeGrades()
    {
        return $this->changeGrades;
    }

    /**
     * Add courseLog
     *
     * @param CourseLog $courseLog
     * @return Course
     */
    public function addCourseLog(CourseLog $courseLog)
    {
        $this->courseLogs[] = $courseLog;
        return $this;
    }

    /**
     * Remove CourseLog
     *
     * @param CourseLog $courseLog
     */
    public function removeCourseLog(CourseLog $courseLog)
    {
        $this->courseLogs->removeElement($courseLog);
    }

    /**
     * Get courseLogs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCourseLogs()
    {
        return $this->courseLogs;
    }
}