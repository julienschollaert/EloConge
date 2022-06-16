<?php

namespace App\Entity;

use App\Repository\ListCongeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListCongeRepository::class)]
class ListConge
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $datedeb;

    #[ORM\Column(type: 'date')]
    private $datefin;

    #[ORM\Column(type: 'string', length: 255)]
    private $commentaire;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $status;

    #[ORM\Column(type: 'integer', nullable: true)]
    private $nbjoursdiff;

    #[ORM\Column(type: 'boolean')]
    private $validation;

    #[ORM\ManyToOne(targetEntity: ListSalary::class, inversedBy: 'listcong')]
    private $idSalaryFk;


    public function __construct()
    {
        $this->idSalary = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDatedeb(): ?\DateTimeInterface
    {
        return $this->datedeb;
    }

    public function setDatedeb(\DateTimeInterface $datedeb): self
    {
        $this->datedeb = $datedeb;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getNbjoursdiff(): ?int
    {
        return $this->nbjoursdiff;
    }

    public function setNbjoursdiff(?int $nbjoursdiff): self
    {
        $this->nbjoursdiff = $nbjoursdiff;

        return $this;
    }

    public function isValidation(): ?bool
    {
        return $this->validation;
    }

    public function setValidation(bool $validation): self
    {
        $this->validation = $validation;

        return $this;
    }

    public function getIdSalaryFk(): ?ListSalary
    {
        return $this->idSalaryFk;
    }

    public function setIdSalaryFk(?ListSalary $idSalaryFk): self
    {
        $this->idSalaryFk = $idSalaryFk;

        return $this;
    }
}
