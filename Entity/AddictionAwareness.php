<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="AddictionsAwareness")
 */
class AddictionAwareness {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $addictionAwarenessId;

    /**
     * @ORM\Column(type="string")
     */
    protected $method;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @ORM\Column(type="string")
     */
    protected $result;

    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    /**
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="addictionsAwareness")
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
     * Get addictionAwarenessId
     *
     * @return integer
     */
    public function getAddictionAwarenessId()
    {
        return $this->addictionAwarenessId;
    }

    /**
     * Set method
     *
     * @param string $method
     * @return AddictionAwareness
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Get method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    
    /**
     * Set date
     *
     * @param /DateTime $date
     * @return AddictionAwareness
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return /DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set result
     *
     * @param string $result
     * @return AddictionAwareness
     */
    public function setResult($result)
    {
        $this->result = $result;

        return $this;
    }

    /**
     * Get result
     *
     * @return string
     */
    public function getResult()
    {
        return $this->result;
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
     * @return AddictionAwareness
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
        return $this;
    }

}