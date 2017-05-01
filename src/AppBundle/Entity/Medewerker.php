<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Medewerker
 *
 * @ORM\Table(name="medewerker")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MedewerkerRepository")
 */
class Medewerker
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="voorletters", type="string", length=255)
     */
    private $voorletters;

    /**
     * @var string
     *
     * @ORM\Column(name="voorvoegsels", type="string", length=255, nullable=true)
     */
    private $voorvoegsels;

    /**
     * @var string
     *
     * @ORM\Column(name="achternaam", type="string", length=255, nullable=true)
     */
    private $achternaam;

    /**
     * @var string
     *
     * @ORM\Column(name="gebruikersnaam", type="string", length=255, nullable=true)
     */
    private $gebruikersnaam;

    /**
     * @var string
     *
     * @ORM\Column(name="wachtwoord", type="string", length=255, nullable=true)
     */
    private $wachtwoord;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set voorletters
     *
     * @param string $voorletters
     *
     * @return Medewerker
     */
    public function setVoorletters($voorletters)
    {
        $this->voorletters = $voorletters;

        return $this;
    }

    /**
     * Get voorletters
     *
     * @return string
     */
    public function getVoorletters()
    {
        return $this->voorletters;
    }

    /**
     * Set voorvoegsels
     *
     * @param string $voorvoegsels
     *
     * @return Medewerker
     */
    public function setVoorvoegsels($voorvoegsels)
    {
        $this->voorvoegsels = $voorvoegsels;

        return $this;
    }

    /**
     * Get voorvoegsels
     *
     * @return string
     */
    public function getVoorvoegsels()
    {
        return $this->voorvoegsels;
    }

    /**
     * Set achternaam
     *
     * @param string $achternaam
     *
     * @return Medewerker
     */
    public function setAchternaam($achternaam)
    {
        $this->achternaam = $achternaam;

        return $this;
    }

    /**
     * Get achternaam
     *
     * @return string
     */
    public function getAchternaam()
    {
        return $this->achternaam;
    }

    /**
     * Set gebruikersnaam
     *
     * @param string $gebruikersnaam
     *
     * @return Medewerker
     */
    public function setGebruikersnaam($gebruikersnaam)
    {
        $this->gebruikersnaam = $gebruikersnaam;

        return $this;
    }

    /**
     * Get gebruikersnaam
     *
     * @return string
     */
    public function getGebruikersnaam()
    {
        return $this->gebruikersnaam;
    }

    /**
     * Set wachtwoord
     *
     * @param string $wachtwoord
     *
     * @return Medewerker
     */
    public function setWachtwoord($wachtwoord)
    {
        $this->wachtwoord = $wachtwoord;

        return $this;
    }

    /**
     * Get wachtwoord
     *
     * @return string
     */
    public function getWachtwoord()
    {
        return $this->wachtwoord;
    }
}
