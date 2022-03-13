<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ClientRepository::class)]
class Client
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    /**
     * @Assert\Length(min = 2,max = 255,
     * minMessage = "Le nom de la société est trop court !",
     * maxMessage = "Le nom de la société est trop long !")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $societe;
    /**
     * @Assert\Length(min = 2,max = 255,
     * minMessage = "L'adresse du client est trop courte !",
     * maxMessage = "L'adresse du client est trop longue !")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $adresse;
    /**
     * @Assert\Length(min = 5,max = 5,
     * exactMessage = "Le code postal du client n'est pas valide !")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $codePostal;
    /**
     * @Assert\Length(min = 2,max = 255,
     * minMessage = "La ville du client est trop courte !",
     * maxMessage = "La ville du client est trop longue !")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $ville;
    /**
     * @Assert\Length(min = 2,max = 255,
     * minMessage = "Le contact du client est trop court !",
     * maxMessage = "Le contact du client est trop long !")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $contact;
    /**
     * @Assert\Length(min = 9,max = 9,
     * exactMessage = "Le téléphone du client n'est pas valide !")
     */
    #[ORM\Column(type: 'integer')]
    private $telephone;
    /**
     * @Assert\Email(message = "L'email n'est pas valide !")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $mailClient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSociete(): ?string
    {
        return $this->societe;
    }

    public function setSociete(string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getContact(): ?string
    {
        return $this->contact;
    }

    public function setContact(string $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMailClient(): ?string
    {
        return $this->mailClient;
    }

    public function setMailClient(string $mailClient): self
    {
        $this->mailClient = $mailClient;

        return $this;
    }
}
