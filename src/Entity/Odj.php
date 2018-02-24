<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OdjRepository")
 */
class Odj
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Reunion", inversedBy="odjs")
     */
    private $reunion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $echanges;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $crOfficiel;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getReunion()
    {
        return $this->reunion;
    }

    /**
     * @param mixed $reunion
     */
    public function setReunion($reunion): void
    {
        $this->reunion = $reunion;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre): void
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getEchanges()
    {
        return $this->echanges;
    }

    /**
     * @param mixed $echanges
     */
    public function setEchanges($echanges): void
    {
        $this->echanges = $echanges;
    }

    /**
     * @return mixed
     */
    public function getCrOfficiel()
    {
        return $this->crOfficiel;
    }

    /**
     * @param mixed $crOfficiel
     */
    public function setCrOfficiel($crOfficiel): void
    {
        $this->crOfficiel = $crOfficiel;
    }



}
