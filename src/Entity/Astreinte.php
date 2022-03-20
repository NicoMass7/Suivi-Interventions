<?php

namespace App\Entity;

use App\Repository\AstreinteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AstreinteRepository::class)]
class Astreinte
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    /**
     * @Assert\Length(min = 2,max = 255,
     * minMessage = "La catégorie d'astreinte est trop courte !",
     * maxMessage = "La catégorie d'astreinte est trop longue !")
     */
    #[ORM\Column(type: 'string', length: 255)]
    private $categorie;
    /**
     * @Assert\Length(min = 2,max = 4,
     * minMessage = "La valeur est trop faible !",
     * maxMessage = "La valeur est trop forte !")
     */
    #[ORM\Column(type: 'integer')]
    private $demiJournee;
    /**
     * @Assert\Length(min = 2,max = 4,
     * minMessage = "La valeur est trop faible !",
     * maxMessage = "La valeur est trop forte !")
     */
    #[ORM\Column(type: 'integer')]
    private $journee;
    /**
     * @Assert\Length(min = 2,max = 4,
     * minMessage = "La valeur est trop faible !",
     * maxMessage = "La valeur est trop forte !")
     */
    #[ORM\Column(type: 'integer')]
    private $nuit;
    /**
     * @Assert\Length(min = 2,max = 4,
     * minMessage = "La valeur est trop faible !",
     * maxMessage = "La valeur est trop forte !")
     */
    #[ORM\Column(type: 'integer')]
    private $ferie;
    /**
     * @Assert\Length(min = 2,max = 4,
     * minMessage = "La valeur est trop faible !",
     * maxMessage = "La valeur est trop forte !")
     */
    #[ORM\Column(type: 'integer')]
    private $weekEnd;
    /**
     * @Assert\Length(min = 2,max = 4,
     * minMessage = "La valeur est trop faible !",
     * maxMessage = "La valeur est trop forte !")
     */
    #[ORM\Column(type: 'integer')]
    private $semaine;

    #[ORM\OneToMany(mappedBy: 'catAstreinte', targetEntity: Intervenant::class)]
    private $intervenants;

    public function __construct()
    {
        $this->intervenants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getDemiJournee(): ?int
    {
        return $this->demiJournee;
    }

    public function setDemiJournee(int $demiJournee): self
    {
        $this->demiJournee = $demiJournee;

        return $this;
    }

    public function getJournee(): ?int
    {
        return $this->journee;
    }

    public function setJournee(int $journee): self
    {
        $this->journee = $journee;

        return $this;
    }

    public function getNuit(): ?int
    {
        return $this->nuit;
    }

    public function setNuit(int $nuit): self
    {
        $this->nuit = $nuit;

        return $this;
    }

    public function getFerie(): ?int
    {
        return $this->ferie;
    }

    public function setFerie(int $ferie): self
    {
        $this->ferie = $ferie;

        return $this;
    }

    public function getWeekEnd(): ?int
    {
        return $this->weekEnd;
    }

    public function setWeekEnd(int $weekEnd): self
    {
        $this->weekEnd = $weekEnd;

        return $this;
    }

    public function getSemaine(): ?int
    {
        return $this->semaine;
    }

    public function setSemaine(int $semaine): self
    {
        $this->semaine = $semaine;

        return $this;
    }

    /**
     * @return Collection<int, Intervenant>
     */
    public function getIntervenants(): Collection
    {
        return $this->intervenants;
    }

    public function addIntervenant(Intervenant $intervenant): self
    {
        if (!$this->intervenants->contains($intervenant)) {
            $this->intervenants[] = $intervenant;
            $intervenant->setCatAstreinte($this);
        }

        return $this;
    }

    public function removeIntervenant(Intervenant $intervenant): self
    {
        if ($this->intervenants->removeElement($intervenant)) {
            // set the owning side to null (unless already changed)
            if ($intervenant->getCatAstreinte() === $this) {
                $intervenant->setCatAstreinte(null);
            }
        }

        return $this;
    }
    public function __toString() : string
    {
        return $this->getCategorie();
    }
}
