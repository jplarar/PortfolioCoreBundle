<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="InternationalPrograms")
 */
class InternationalProgram {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $internationalProgramId;

    /**
     * @ORM\Column(type="string")
     */
    protected $university;

    /**
     * @ORM\Column(type="string")
     */
    protected $country;

    /**
     * @ORM\Column(type="string")
     */
    protected $type;

    /**
     * @ORM\Column(type="string")
     */
    protected $period;

    /**
     * @ORM\Column(type="string")
     */
    protected $status;

    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    /**
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="internationalPrograms")
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
     * @return InternationalProgram
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
        return $this;
    }

}