<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="Students")
 */
class Student {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $studentId;

    /**
     * @ORM\Column(type="string")
     */
    protected $fullName;

    /**
     * @ORM\Column(type="integer")
     */
    protected $semester;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $localAddress;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $foreignAddress;

    /**
     * @ORM\Column(type="integer")
     */
    protected $telephone;

    /**
     * @ORM\Column(type="string")
     */
    protected $career;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $admissionDate;

    /**
     * @ORM\Column(type="string")
     */
    protected $status;

    /**
     * grade point average
     *
     * @ORM\Column(type="string")
     */
    protected $gpa;

    /**
     * @ORM\Column(type="integer")
     */
    protected $units;

    #########################
    ## OBJECT RELATIONSHIP ##
    #########################

    /**
     * @ORM\OneToMany(targetEntity="Toefl", mappedBy="studentId")
     */
    protected $toefls;

    /**
     * @ORM\OneToMany(targetEntity="SubjectDropout", mappedBy="studentId")
     */
    protected $subjectDropouts;

    #########################
    ##      CONSTRUCTOR    ##
    #########################

    public function __construct()
    {
        $this->toefls = new ArrayCollection();
        $this->subjectDropouts = new ArrayCollection();
    }

    #########################
    ##   SPECIAL METHODS   ##
    #########################

    // none.

    #########################
    ## GETTERs AND SETTERs ##
    #########################

    /**
     * Add toefl
     *
     * @param Toefl $toefl
     * @return Student
     */
    public function addToefl(Toefl $toefl)
    {
        $this->toefls[] = $toefl;
        return $this;
    }

    /**
     * Remove toefl
     *
     * @param Toefl $toefl
     */
    public function removeToefl(Toefl $toefl)
    {
        $this->toefls->removeElement($toefl);
    }

    /**
     * Get toefls
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getToefls()
    {
        return $this->toefls;
    }

    /**
     * Add SubjectDropout
     *
     * @param SubjectDropout $subjectDropout
     * @return Student
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

}