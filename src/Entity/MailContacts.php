<?php

namespace App\Entity;

use App\Repository\MailContactsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MailContactsRepository::class)]
class MailContacts
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

    #[ORM\ManyToMany(targetEntity: Licenciers::class, inversedBy: 'mailContacts')]
    private Collection $contactDuLicencier;

    public function __construct()
    {
        $this->contactDuLicencier = new ArrayCollection();
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

    /**
     * @return Collection<int, Licenciers>
     */
    public function getContactDuLicencier(): Collection
    {
        return $this->contactDuLicencier;
    }

    public function addContactDuLicencier(Licenciers $contactDuLicencier): static
    {
        if (!$this->contactDuLicencier->contains($contactDuLicencier)) {
            $this->contactDuLicencier->add($contactDuLicencier);
        }

        return $this;
    }

    public function removeContactDuLicencier(Licenciers $contactDuLicencier): static
    {
        $this->contactDuLicencier->removeElement($contactDuLicencier);

        return $this;
    }

    
}
