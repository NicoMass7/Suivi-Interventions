<?php

namespace App\Entity;

use App\Repository\IntervenantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: IntervenantRepository::class)]
class Intervenant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    /**
     * @Assert\Length(min = 2,max = 255,
     * minMessage = "Le nom de l'intervenant est trop court !",
     * maxMessage = "Le nom de l'intervenant est trop long !")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $nom;
    /**
     * @Assert\Length(min = 2,max = 255,
     * minMessage = "Le prénom de l'intervenant est trop court !",
     * maxMessage = "Le prénom de l'intervenant est trop long !")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $prenom;
    /**
     * @Assert\Length(min = 3,max = 4,
     * minMessage = "Le trigramme de l'intervenant est trop court !",
     * maxMessage = "Le trigramme de l'intervenant est trop long !")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $trigramme;
    /**
     * @Assert\Email(message = "L'email n'est pas valide !")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $mail;
    /**
     * @Assert\Length(min = 5,max = 6,
     * minMessage = "Le trigramme de l'intervenant est trop court !",
     * maxMessage = "Le trigramme de l'intervenant est trop long !")
     */
    #[ORM\Column(type: 'integer')]
    private $salaire;

    #[ORM\ManyToOne(targetEntity: Astreinte::class, inversedBy: 'intervenants')]
    private $catAstreinte;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'intervenants')]
    private $idResponsable;

    #[ORM\OneToMany(mappedBy: 'idResponsable', targetEntity: self::class)]
    private $intervenants;

    public function __construct()
    {
        $this->intervenants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTrigramme(): ?string
    {
        return $this->trigramme;
    }

    public function setTrigramme(string $trigramme): self
    {
        $this->trigramme = mb_strtoupper($trigramme);

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getSalaire(): ?int
    {
        return $this->salaire;
    }

    public function setSalaire(int $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getCatAstreinte(): ?Astreinte
    {
        return $this->catAstreinte;
    }

    public function setCatAstreinte(?Astreinte $catAstreinte): self
    {
        $this->catAstreinte = $catAstreinte;

        return $this;
    }

    public function getIdResponsable(): ?self
    {
        return $this->idResponsable;
    }

    public function setIdResponsable(?self $idResponsable): self
    {
        $this->idResponsable = $idResponsable;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getIntervenants(): Collection
    {
        return $this->intervenants;
    }

    public function addIntervenant(self $intervenant): self
    {
        if (!$this->intervenants->contains($intervenant)) {
            $this->intervenants[] = $intervenant;
            $intervenant->setIdResponsable($this);
        }
        return $this;
    }

    public function removeIntervenant(self $intervenant): self
    {
        if ($this->intervenants->removeElement($intervenant)) {
            // set the owning side to null (unless already changed)
            if ($intervenant->getIdResponsable() === $this) {
                $intervenant->setIdResponsable(null);
            }
        }
        return $this;
    }
    
}
