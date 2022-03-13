<?php

namespace App\Entity;

use App\Repository\RhRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RhRepository::class)]
class Rh
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $nomRh;

    #[ORM\Column(type: 'string', length: 255)]
    private $prenomRh;

    #[ORM\Column(type: 'string', length: 255)]
    private $mailRh;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomRh(): ?string
    {
        return $this->nomRh;
    }

    public function setNomRh(string $nomRh): self
    {
        $this->nomRh = $nomRh;

        return $this;
    }

    public function getPrenomRh(): ?string
    {
        return $this->prenomRh;
    }

    public function setPrenomRh(string $prenomRh): self
    {
        $this->prenomRh = $prenomRh;

        return $this;
    }

    public function getMailRh(): ?string
    {
        return $this->mailRh;
    }

    public function setMailRh(string $mailRh): self
    {
        $this->mailRh = $mailRh;

        return $this;
    }
}
