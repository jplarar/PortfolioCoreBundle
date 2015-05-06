<?php

namespace Portfolio\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="Toefls")
 */
class Toefl {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", unique=TRUE)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $toeflId;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=2)
     */
    protected $score;

    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

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

    // none.
    /**
     * Get toeflId
     *
     * @return integer
     */
    public function getToeflId()
    {
        return $this->toeflId;
    }

    /**
     * Set score
     *
     * @param decimal $score
     * @return Toefl
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return decimal
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set date
     *
     * @param /DateTime $date
     * @return Toefl
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

}