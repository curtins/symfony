<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * People
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class People
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="playerID", type="string", length=10)
     */
    private $playerID;

    /**
     * @var string
     *
     * @ORM\Column(name="nameLast", type="string", length=50)
     */
    private $nameLast;

    /**
     * @var string
     *
     * @ORM\Column(name="nameFirst", type="string", length=50)
     */
    private $nameFirst;

    /**
     * @var string
     *
     * @ORM\Column(name="retroID", type="string", length=9)
     */
    private $retroID;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set playerID
     *
     * @param string $playerID
     *
     * @return People
     */
    public function setPlayerID($playerID)
    {
        $this->playerID = $playerID;

        return $this;
    }

    /**
     * Get playerID
     *
     * @return string
     */
    public function getPlayerID()
    {
        return $this->playerID;
    }

    /**
     * Set nameLast
     *
     * @param string $nameLast
     *
     * @return People
     */
    public function setNameLast($nameLast)
    {
        $this->nameLast = $nameLast;

        return $this;
    }

    /**
     * Get nameLast
     *
     * @return string
     */
    public function getNameLast()
    {
        return $this->nameLast;
    }

    /**
     * Set nameFirst
     *
     * @param string $nameFirst
     *
     * @return People
     */
    public function setNameFirst($nameFirst)
    {
        $this->nameFirst = $nameFirst;

        return $this;
    }

    /**
     * Get nameFirst
     *
     * @return string
     */
    public function getNameFirst()
    {
        return $this->nameFirst;
    }

    /**
     * Set retroID
     *
     * @param string $retroID
     *
     * @return People
     */
    public function setRetroID($retroID)
    {
        $this->retroID = $retroID;

        return $this;
    }

    /**
     * Get retroID
     *
     * @return string
     */
    public function getRetroID()
    {
        return $this->retroID;
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}

