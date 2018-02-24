<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ReunionRepository")
 */
class Reunion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nom;

    /**
     * @var \DateTime[]
     * @ORM\Column(type="array")
     */
    private $dates;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Odj", mappedBy="reunion", cascade={"persist"}, orphanRemoval=true)
     */
    private $odjs;

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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return \DateTime[]
     */
    public function getDates()
    {
        return $this->dates;
    }

    /**
     * @param \DateTime[] $dates
     */
    public function setDates($dates): void
    {
        $this->dates = $dates;
    }

    /**
     * @param \DateTime $date
     */
    public function addDate($date): void
    {
        array_push($this->dates, $date);
    }

    /**
     * @return mixed
     */
    public function getOdjs()
    {
        return $this->odjs;
    }

    /**
     * @param mixed $odjs
     */
    public function setOdjs($odjs): void
    {
        $this->odjs = $odjs;
    }




}
