<?php

namespace App\Entity;

use App\Repository\MailsEducateursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MailsEducateursRepository::class)]
class MailsEducateurs
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateDenvoi = null;

    #[ORM\Column(length: 255)]
    private ?string $objet = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $message = null;

    #[ORM\ManyToOne(inversedBy: 'mailsEducateurs')]
    private ?Educateurs $educateurs = null;

    #[ORM\ManyToMany(targetEntity: Educateurs::class, inversedBy: 'mailsEducateurs')]
    private Collection $educateur;

    public function __construct()
    {
        $this->educateur = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDenvoi(): ?\DateTimeInterface
    {
        return $this->dateDenvoi;
    }

    public function setDateDenvoi(\DateTimeInterface $dateDenvoi): static
    {
        $this->dateDenvoi = $dateDenvoi;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): static
    {
        $this->objet = $objet;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getEducateurs(): ?Educateurs
    {
        return $this->educateurs;
    }

    public function setEducateurs(?Educateurs $educateurs): static
    {
        $this->educateurs = $educateurs;

        return $this;
    }

    /**
     * @return Collection<int, Educateurs>
     */
    public function getEducateur(): Collection
    {
        return $this->educateur;
    }

    public function addEducateur(Educateurs $educateur): static
    {
        if (!$this->educateur->contains($educateur)) {
            $this->educateur->add($educateur);
        }

        return $this;
    }

    public function removeEducateur(Educateurs $educateur): static
    {
        $this->educateur->removeElement($educateur);

        return $this;
    }
}
