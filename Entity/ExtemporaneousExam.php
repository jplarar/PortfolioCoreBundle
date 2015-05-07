<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="ExtemporaneousExams")
 */
    class ExtemporaneousExam {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $extemporaneousExamId;

    /**
     * @ORM\Column(type="string")
     */
    protected $period;

    /**
     * @ORM\Column(type="string")
     */
    protected $exam;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $originalDate;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $newDate;

    /**
     * @ORM\Column(type="string")
     */
    protected $motive;

    /**
     * @ORM\Column(type="integer")
     */
    protected $studentId;

    /**
     * @ORM\Column(type="integer")
     */
    protected $courseCode;

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

    /**
     * Get extemporaneousExamId
     *
     * @return integer
     */
    public function getExtemporaneousExamId()
    {
        return $this->extemporaneousExamId;
    }

    /**
     * Set period
     *
     * @param string $period
     * @return ExtemporaneousExam
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
     * Set exam
     *
     * @param string $exam
     * @return ExtemporaneousExam
     */
    public function setExam($exam)
    {
        $this->exam = $exam;

        return $this;
    }

    /**
     * Get exam
     *
     * @return string
     */
    public function getExam()
    {
        return $this->exam;
    }

    /**
     * Set originalDate
     *
     * @param /DateTime $originalDate
     * @return ExtemporaneousExam
     */
    public function setOriginalDate($originalDate)
    {
        $this->originalDate = $originalDate;

        return $this;
    }

    /**
     * Get originalDate
     *
     * @return /DateTime
     */
    public function getOriginalDate()
    {
        return $this->originalDate;
    }

    /**
     * Set newDate
     *
     * @param /DateTime $newDate
     * @return ExtemporaneousExam
     */
    public function setNewDate($newDate)
    {
        $this->newDate = $newDate;

        return $this;
    }

    /**
     * Get newDate
     *
     * @return /DateTime
     */
    public function getNewDate()
    {
        return $this->newDate;
    }

    /**
     * Set motive
     *
     * @param string $motive
     * @return ExtemporaneousExam
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
     * Get StudentId
     * @return integer
     */
    public function getStudentId()
    {
        return $this->studentId;

    }

    /**
     * Set StudentId
     * @param Student $studentId
     * @return ExtemporaneousExam
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
    public function getCourseCode()
    {
        return $this->courseCode;
    }

    /**
     * Set CourseCode
     * @param Course $courseCode
     * @return ExtemporaneousExam
     */
    public function setCourseCode($courseCode)
    {
        $this->courseCode = $courseCode;
        return $this;
    }
}