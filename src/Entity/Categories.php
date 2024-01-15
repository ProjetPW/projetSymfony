<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoriesRepository::class)]
class Categories
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;
    
    #[ORM\Column(length: 255)]
    private ?string $nomCategory = null;

    #[ORM\OneToMany(mappedBy: 'category', targetEntity: Licenciers::class)]
    private Collection $licenciers;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $uid = null;

    public function __construct()
    {
        $this->uid= uniqid();
        $this->licenciers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCategory(): ?string
    {
        return $this->nomCategory;
    }

    public function setNomCategory(string $nomCategory): static
    {
        $this->nomCategory = $nomCategory;

        return $this;
    }

    /**
     * @return Collection<int, Licenciers>
     */
    public function getLicenciers(): Collection
    {
        return $this->licenciers;
    }

    public function addLicencier(Licenciers $licencier): static
    {
        if (!$this->licenciers->contains($licencier)) {
            $this->licenciers->add($licencier);
            $licencier->setCategory($this);
        }

        return $this;
    }

    public function removeLicencier(Licenciers $licencier): static
    {
        if ($this->licenciers->removeElement($licencier)) {
            // set the owning side to null (unless already changed)
            if ($licencier->getCategory() === $this) {
                $licencier->setCategory(null);
            }
        }

        return $this;
    }

    public function getUid(): ?string
    {
        return $this->uid;
    }

    public function setUid(?string $uid): static
    {
        $this->uid = $uid;

        return $this;
    }
    public function __toString()
    {
        return $this->getNomCategory(); // ou toute autre propriété qui représente l'objet en tant que chaîne
    }
}
