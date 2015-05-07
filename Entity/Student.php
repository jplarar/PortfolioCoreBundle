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
     * @ORM\Column(type="string")
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
     * Range: -999.99 to 999.99
     * @ORM\Column(type="decimal", precision=5, scale=2)
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

    /**
     * @ORM\OneToMany(targetEntity="SocialService", mappedBy="studentId")
     */
    protected $socialServices;

    /**
     * @ORM\OneToMany(targetEntity="Sport", mappedBy="studentId")
     */
    protected $sports;

    /**
     * @ORM\OneToMany(targetEntity="StudentGroup", mappedBy="studentId")
     */
    protected $studentGroups;

    /**
     * @ORM\OneToMany(targetEntity="RepresentativeTeam", mappedBy="studentId")
     */
    protected $representativeTeams;

    /**
     * @ORM\OneToMany(targetEntity="InternationalProgram", mappedBy="studentId")
     */
    protected $internationalPrograms;

    /**
     * @ORM\OneToMany(targetEntity="CulturalDiffusion", mappedBy="studentId")
     */
    protected $culturalDiffusions;

    /**
     * @ORM\OneToMany(targetEntity="ChangeGrade", mappedBy="studentId")
     */
    protected $changeGrades;

    /**
     * @ORM\OneToMany(targetEntity="CourseLog", mappedBy="studentId")
     */
    protected $courseLogs;

    /**
     * @ORM\OneToMany(targetEntity="AddictionAwareness", mappedBy="studentId")
     */
    protected $addictionsAwareness;

    #########################
    ##      CONSTRUCTOR    ##
    #########################

    public function __construct()
    {
        $this->toefls = new ArrayCollection();
        $this->subjectDropouts = new ArrayCollection();
        $this->$socialServices = new ArrayCollection();
        $this->$sports = new ArrayCollection();
        $this->$studentGroups = new ArrayCollection();
        $this->$representativeTeams = new ArrayCollection();
        $this->internationalPrograms = new ArrayCollection();
        $this->$culturalDiffusions = new ArrayCollection();
        $this->$changeGrades = new ArrayCollection();
        $this->courseLogs = new ArrayCollection();
        $this->$addictionsAwareness = new ArrayCollection();
    }

    #########################
    ##   SPECIAL METHODS   ##
    #########################

    // none.

    #########################
    ## GETTERs AND SETTERs ##
    #########################

    /**
     * Get studentId
     *
     * @return integer
     */
    public function getStudentId()
    {
        return $this->studentId;
    }

    /**
     * Set StudentId
     * @param int $studentId
     * @return Student
     */
    public function setStudentId($studentId)
    {
        $this->studentId = $studentId;
        return $this;
    }

    /**
     * Set fullName
     *
     * @param string $fullName
     * @return Student
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set semester
     *
     * @param integer $semester
     * @return Student
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
     * Set localAddress
     *
     * @param string $localAddress
     * @return Student
     */
    public function setLocalAddress($localAddress)
    {
        $this->localAddress = $localAddress;

        return $this;
    }

    /**
     * Get localAddress
     *
     * @return string
     */
    public function getLocalAddress()
    {
        return $this->localAddress;
    }

    /**
     * Set foreignAddress
     *
     * @param string $foreignAddress
     * @return Student
     */
    public function setForeignAddress($foreignAddress)
    {
        $this->foreignAddress = $foreignAddress;

        return $this;
    }

    /**
     * Get foreignAddress
     *
     * @return string
     */
    public function getForeignAddress()
    {
        return $this->foreignAddress;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Student
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set career
     *
     * @param string $career
     * @return Student
     */
    public function setCareer($career)
    {
        $this->career = $career;

        return $this;
    }

    /**
     * Get career
     *
     * @return string
     */
    public function getCareer()
    {
        return $this->career;
    }

    /**
     * Set admissionDate
     *
     * @param /DateTime $admissionDate
     * @return Student
     */
    public function setAdmissionDate($admissionDate)
    {
        $this->admissionDate = $admissionDate;

        return $this;
    }

    /**
     * Get admissionDate
     *
     * @return /DateTime
     */
    public function getAdmissionDate()
    {
        return $this->admissionDate;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return Student
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set gpa
     *
     * @param double $gpa
     * @return Student
     */
    public function setGpa($gpa)
    {
        $this->gpa = $gpa;

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
     * Set units
     *
     * @param integer $units
     * @return Student
     */
    public function setUnits($units)
    {
        $this->units = $units;

        return $this;
    }

    /**
     * Get status
     *
     * @return double
     */
    public function getGpa()
    {
        return $this->gpa;
    }

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

    /**
     * Add SocialService
     *
     * @param SocialService $socialService
     * @return Student
     */
    public function addSocialService(SocialService $socialService)
    {
        $this->socialServices[] = $socialService;
        return $this;
    }

    /**
     * Remove SocialService
     *
     * @param SocialService $socialService
     */
    public function removeSocialService(SocialService $socialService)
    {
        $this->socialServices->removeElement($socialService);
    }

    /**
     * Get SocialService
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSocialServices()
    {
        return $this->socialServices;
    }

    /**
     * Add Sport
     *
     * @param Sport $sport
     * @return Student
     */
    public function addSport(Sport $sport)
    {
        $this->sports[] = $sport;
        return $this;
    }

    /**
     * Remove Sport
     *
     * @param Sport $sport
     */
    public function removeSport(Sport $sport)
    {
        $this->sports->removeElement($sport);
    }

    /**
     * Get Sport
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSports()
    {
        return $this->sports;
    }

    /**
     * Add StudentGroup
     *
     * @param StudentGroup $studentGroup
     * @return Student
     */
    public function addStudentGroup(StudentGroup $studentGroup)
    {
        $this->studentGroups[] = $studentGroup;
        return $this;
    }

	/**
     * Remove StudentGroup
     *
     * @param StudentGroup $studentGroup
     */
    public function removeStudentGroup(StudentGroup $studentGroup)
    {
        $this->studentGroups->removeElement($studentGroup);
    }

    /**
     * Get StudentGroup
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStudentGroups()
    {
        return $this->studentGroups;
    }

    /**
     * Add representativeTeam
     *
     * @param RepresentativeTeam $representativeTeam
     * @return Student
     */
    public function addRepresentativeTeam(RepresentativeTeam $representativeTeam)
    {
        $this->representativeTeams[] = $representativeTeam;
        return $this;
    }

    /**
     * Remove representativeTeam
     *
     * @param RepresentativeTeam $representativeTeam
     */
    public function removeRepresentativeTeam(RepresentativeTeam $representativeTeam)
    {
        $this->representativeTeams->removeElement($representativeTeam);
    }

    /**
     * Get representativeTeams
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getRepresentativeTeams()
    {
        return $this->representativeTeams;
    }

    /**
     * Add internationalProgram
     *
     * @param InternationalProgram $internationalProgram
     * @return Student
     */
    public function addInternationalProgram(InternationalProgram $internationalProgram)
    {
        $this->internationalPrograms[] = $internationalProgram;
        return $this;
    }

    /**
     * Remove internationalProgram
     *
     * @param InternationalProgram $internationalProgram
     */
    public function removeInternationalProgram(InternationalProgram $internationalProgram)
    {
        $this->internationalPrograms->removeElement($internationalProgram);
    }

    /**
     * Get internationalPrograms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInternationalPrograms()
    {
        return $this->internationalPrograms;
    }

    /**
     * Add culturalDiffusion
     *
     * @param CulturalDiffusion $culturalDiffusion
     * @return Student
     */
    public function addCulturalDiffusion(CulturalDiffusion $culturalDiffusion)
    {
        $this->culturalDiffusions[] = $culturalDiffusion;
        return $this;
    }

    /**
     * Remove culturalDiffusion
     *
     * @param CulturalDiffusion $culturalDiffusion
     */
    public function removeCulturalDiffusion(CulturalDiffusion $culturalDiffusion)
    {
        $this->culturalDiffusions->removeElement($culturalDiffusion);
    }

    /**
     * Get culturalDiffusions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCulturalDiffusions()
    {
        return $this->culturalDiffusions;
    }

    /**
     * Add changeGrade
     *
     * @param ChangeGrade $changeGrade
     * @return Student
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
     * @return Student
     */
    public function addCourseLog(CourseLog $courseLog)
    {
        $this->courseLogs[] = $courseLog;
        return $this;
    }

    /**
     * Remove courseLog
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
    public function getCourseLog()
    {
        return $this->courseLogs;
    }

    /**
     * Add addictionAwareness
     *
     * @param AddictionAwareness $addictionAwareness
     * @return Student
     */
    public function addAddictionAwareness(AddictionAwareness $addictionAwareness)
    {
        $this->addictionsAwareness[] = $addictionAwareness;
        return $this;
    }

    /**
     * Remove addictionAwareness
     *
     * @param AddictionAwareness $addictionAwareness
     */
    public function removeAddictionAwareness(AddictionAwareness $addictionAwareness)
    {
        $this->addictionsAwareness->removeElement($addictionAwareness);
    }

    /**
     * Get addictionsAwareness
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAddictionsAwareness()
    {
        return $this->addictionsAwareness;
    }

}