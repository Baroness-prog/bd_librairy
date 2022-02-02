<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
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
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbBd;

    /**
     * @ORM\ManyToMany(targetEntity=BdCollection::class, inversedBy="user")
     */
    private $bd;

    public function __construct()
    {
        $this->bd = new ArrayCollection();
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

    public function getNbBd(): ?int
    {
        return $this->nbBd;
    }

    public function setNbBd(?int $nbBd): self
    {
        $this->nbBd = $nbBd;

        return $this;
    }

    /**
     * @return Collection|BdCollection[]
     */
    public function getBd(): Collection
    {
        return $this->bd;
    }

    public function addBd(BdCollection $bd): self
    {
        if (!$this->bd->contains($bd)) {
            $this->bd[] = $bd;
        }

        return $this;
    }

    public function removeBd(BdCollection $bd): self
    {
        $this->bd->removeElement($bd);

        return $this;
    }
}
