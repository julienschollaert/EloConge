<?php

namespace App\Entity;

use App\Repository\CompteurAncienneteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompteurAncienneteRepository::class)]
class CompteurAnciennete
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $nbjours;

    #[ORM\OneToMany(mappedBy: 'idCompteur', targetEntity: ListSalary::class)]
    private $listSalaries;

    public function __construct()
    {
        $this->listSalaries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbjours(): ?int
    {
        return $this->nbjours;
    }

    public function setNbjours(int $nbjours): self
    {
        $this->nbjours = $nbjours;

        return $this;
    }

    /**
     * @return Collection<int, ListSalary>
     */
    public function getListSalaries(): Collection
    {
        return $this->listSalaries;
    }

    public function addListSalary(ListSalary $listSalary): self
    {
        if (!$this->listSalaries->contains($listSalary)) {
            $this->listSalaries[] = $listSalary;
            $listSalary->setIdCompteur($this);
        }

        return $this;
    }

    public function removeListSalary(ListSalary $listSalary): self
    {
        if ($this->listSalaries->removeElement($listSalary)) {
            // set the owning side to null (unless already changed)
            if ($listSalary->getIdCompteur() === $this) {
                $listSalary->setIdCompteur(null);
            }
        }

        return $this;
    }
}
