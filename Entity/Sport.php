<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="Sports")
 */
class Sport {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $sportId;

    /**
     * @ORM\Column(type="string")
     */
    protected $discipline;

    /**
     * @ORM\Column(type="string")
     */
    protected $team;

    /**
     * @ORM\Column(type="string")
     */
    protected $period;

    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    /**
     * @ORM\ManyToOne(targetEntity="Student", inversedBy="sports")
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
     * Get sportId
     *
     * @return integer
     */
    public function getSportId()
    {
        return $this->sportId;
    }

    /**
     * Set discipline
     *
     * @param string $discipline
     * @return Sport
     */
    public function setDiscipline($discipline)
    {
        $this->discipline = $discipline;

        return $this;
    }

    /**
     * Get discipline
     *
     * @return string
     */
    public function getDiscipline()
    {
        return $this->discipline;
    }

    /**
     * Set team
     *
     * @param string $team
     * @return Sport
     */
    public function setTeam($team)
    {
        $this->team = $team;

        return $this;
    }

    /**
     * Get team
     *
     * @return string
     */
    public function getTeam()
    {
        return $this->team;
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
     * @return Sport
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
        return $this;
    }

    /**
     * Set period
     *
     * @param string $period
     * @return Sport
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
}