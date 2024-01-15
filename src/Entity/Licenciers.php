<?php

namespace App\Entity;

use App\Repository\LicenciersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LicenciersRepository::class)]
class Licenciers
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $numeroLicencier = null;

    #[ORM\Column(length: 255)]
    private ?string $nomLicencier = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomLicencier = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?Contacts $contactId = null;

    #[ORM\ManyToOne(inversedBy: 'licenciers')]
    private ?Categories $category = null;

    #[ORM\ManyToMany(targetEntity: MailContacts::class, mappedBy: 'contactDuLicencier')]
    private Collection $mailContacts;

    public function __construct()
    {
        $this->numeroLicencier = uniqid();
        $this->mailContacts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroLicencier(): ?string
    {
        return $this->numeroLicencier;
    }

    public function setNumeroLicencier(string $numeroLicencier): static
    {
        $this->numeroLicencier = $numeroLicencier;

        return $this;
    }

    public function getNomLicencier(): ?string
    {
        return $this->nomLicencier;
    }

    public function setNomLicencier(string $nomLicencier): static
    {
        $this->nomLicencier = $nomLicencier;

        return $this;
    }

    public function getPrenomLicencier(): ?string
    {
        return $this->prenomLicencier;
    }

    public function setPrenomLicencier(string $prenomLicencier): static
    {
        $this->prenomLicencier = $prenomLicencier;

        return $this;
    }

    public function getContactId(): ?Contacts
    {
        return $this->contactId;
    }

    public function setContactId(?Contacts $contactId): static
    {
        $this->contactId = $contactId;
        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): static
    {
        $this->category = $category;

        return $this;
    }

    /**
     * @return Collection<int, MailContacts>
     */
    public function getMailContacts(): Collection
    {
        return $this->mailContacts;
    }

    public function addMailContact(MailContacts $mailContact): static
    {
        if (!$this->mailContacts->contains($mailContact)) {
            $this->mailContacts->add($mailContact);
            $mailContact->addContactDuLicencier($this);
        }
        return $this;
    }

    public function removeMailContact(MailContacts $mailContact): static
    {
        if ($this->mailContacts->removeElement($mailContact)) {
            $mailContact->removeContactDuLicencier($this);
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getNomLicencier(). " " .$this->getPrenomLicencier(); // ou toute autre propriété qui représente l'objet en tant que chaîne
    }
   
}
