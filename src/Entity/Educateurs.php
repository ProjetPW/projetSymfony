<?php

namespace App\Entity;

use App\Repository\EducateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EducateursRepository::class)]
class Educateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $emailEducateur = null;

    #[ORM\Column(length: 255)]
    private ?string $mdp = null;

    #[ORM\Column]
    private ?bool $estAdmin = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Licenciers $licencier = null;

    #[ORM\ManyToMany(targetEntity: MailsEducateurs::class, mappedBy: 'educateur')]
    private Collection $mailsEducateurs;

    public function __construct()
    {
        $this->mailsEducateurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmailEducateur(): ?string
    {
        return $this->emailEducateur;
    }

    public function setEmailEducateur(string $emailEducateur): static
    {
        $this->emailEducateur = $emailEducateur;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): static
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function isEstAdmin(): ?bool
    {
        return $this->estAdmin;
    }

    public function setEstAdmin(bool $estAdmin): static
    {
        $this->estAdmin = $estAdmin;

        return $this;
    }

    public function getLicencier(): ?Licenciers
    {
        return $this->licencier;
    }

    public function setLicencier(?Licenciers $licencier): static
    {
        $this->licencier = $licencier;

        return $this;
    }

    /**
     * @return Collection<int, MailsEducateurs>
     */
    public function getMailsEducateurs(): Collection
    {
        return $this->mailsEducateurs;
    }

    public function addMailsEducateur(MailsEducateurs $mailsEducateur): static
    {
        if (!$this->mailsEducateurs->contains($mailsEducateur)) {
            $this->mailsEducateurs->add($mailsEducateur);
            $mailsEducateur->addEducateur($this);
        }
        return $this;
    }

    public function removeMailsEducateur(MailsEducateurs $mailsEducateur): static
    {
        if ($this->mailsEducateurs->removeElement($mailsEducateur)) {
            $mailsEducateur->removeEducateur($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getEmailEducateur(); // ou toute autre propriété qui représente l'objet en tant que chaîne
    }

    
}
