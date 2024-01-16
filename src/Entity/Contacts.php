<?php

namespace App\Entity;

use App\Repository\ContactsRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactsRepository::class)]
class Contacts
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    
    private ?string $nomContact = null;

    #[ORM\Column(length: 255)]
    private ?string $prenomContact = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $tel = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomContact(): ?string
    {
        return $this->nomContact;
    }

    public function setNomContact(string $nomContact): static
    {
        $this->nomContact = $nomContact;

        return $this;
    }

    public function getPrenomContact(): ?string
    {
        return $this->prenomContact;
    }

    public function setPrenomContact(string $prenomContact): static
    {
        $this->prenomContact = $prenomContact;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): static
    {
        $this->tel = $tel;

        return $this;
    }

    public function __toString()
    {
        return $this->getNomContact() . " " .$this->getPrenomContact(); // ou toute autre propriété qui représente l'objet en tant que chaîne
    }
}
