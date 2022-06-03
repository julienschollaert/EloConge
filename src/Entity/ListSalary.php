<?php

namespace App\Entity;

use App\Repository\ListSalaryRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListSalaryRepository::class)]
class ListSalary
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $surname;

    #[ORM\Column(type: 'integer')]
    private $solde;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $telephone;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $adress;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $city;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $country;

    #[ORM\ManyToOne(targetEntity: ListService::class, inversedBy: 'listSalaries')]
    private $idService;

    #[ORM\ManyToOne(targetEntity: CompteurAnciennete::class, inversedBy: 'listSalaries')]
    private $idCompteur;

    #[ORM\Column(type: 'string', length: 255)]
    private $jobname;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }

    public function getSolde(): ?int
    {
        return $this->solde;
    }

    public function setSolde(int $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(?string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getIdService(): ?ListService
    {
        return $this->idService;
    }

    public function setIdService(?ListService $idService): self
    {
        $this->idService = $idService;

        return $this;
    }

    public function getIdCompteur(): ?CompteurAnciennete
    {
        return $this->idCompteur;
    }

    public function setIdCompteur(?CompteurAnciennete $idCompteur): self
    {
        $this->idCompteur = $idCompteur;

        return $this;
    }

    public function getJobname(): ?string
    {
        return $this->jobname;
    }

    public function setJobname(string $jobname): self
    {
        $this->jobname = $jobname;

        return $this;
    }
}
