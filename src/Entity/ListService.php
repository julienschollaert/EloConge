<?php

namespace App\Entity;

use App\Repository\ListServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ListServiceRepository::class)]
class ListService
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $libelle;

    #[ORM\OneToMany(mappedBy: 'idService', targetEntity: ListSalary::class)]
    private $listSalaries;

    public function __construct()
    {
        $this->listSalaries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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
            $listSalary->setIdService($this);
        }

        return $this;
    }

    public function removeListSalary(ListSalary $listSalary): self
    {
        if ($this->listSalaries->removeElement($listSalary)) {
            // set the owning side to null (unless already changed)
            if ($listSalary->getIdService() === $this) {
                $listSalary->setIdService(null);
            }
        }

        return $this;
    }
}
