<?php

namespace App\Entity;

use App\Repository\GenreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GenreRepository::class)
 */
class Genre
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=BdCollection::class, mappedBy="relation")
     */
    private $bdCollections;

    public function __construct()
    {
        $this->bdCollections = new ArrayCollection();
    }

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

    /**
     * @return Collection|BdCollection[]
     */
    public function getBdCollections(): Collection
    {
        return $this->bdCollections;
    }

    public function addBdCollection(BdCollection $bdCollection): self
    {
        if (!$this->bdCollections->contains($bdCollection)) {
            $this->bdCollections[] = $bdCollection;
            $bdCollection->setRelation($this);
        }

        return $this;
    }

    public function removeBdCollection(BdCollection $bdCollection): self
    {
        if ($this->bdCollections->removeElement($bdCollection)) {
            // set the owning side to null (unless already changed)
            if ($bdCollection->getRelation() === $this) {
                $bdCollection->setRelation(null);
            }
        }

        return $this;
    }
}
