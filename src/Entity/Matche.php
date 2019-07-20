<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MatcheRepository")
 * @ORM\Table(name="Matches")
 */
class Matche
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $domicile_exterieur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $equipe_adverse;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_heure;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_semaine;

    /**
     * @ORM\Column(type="integer")
     */
    private $num_journee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gymnase;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Equipe", inversedBy="matches")
     * @ORM\JoinColumn(name="equipe_locale", referencedColumnName="id", nullable=false)
     */
    private $equipe_locale;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDomicileExterieur(): ?bool
    {
        return $this->domicile_exterieur;
    }

    public function setDomicileExterieur(bool $domicile_exterieur): self
    {
        $this->domicile_exterieur = $domicile_exterieur;

        return $this;
    }

    public function getEquipeAdverse(): ?string
    {
        return $this->equipe_adverse;
    }

    public function setEquipeAdverse(string $equipe_adverse): self
    {
        $this->equipe_adverse = $equipe_adverse;

        return $this;
    }

    public function getDateHeure(): ?\DateTimeInterface
    {
        return $this->date_heure;
    }

    public function setDateHeure(\DateTimeInterface $date_heure): self
    {
        $this->date_heure = $date_heure;

        return $this;
    }

    public function getNumSemaine(): ?int
    {
        return $this->num_semaine;
    }

    public function setNumSemaine(int $num_semaine): self
    {
        $this->num_semaine = $num_semaine;

        return $this;
    }

    public function getNumJournee(): ?int
    {
        return $this->num_journee;
    }

    public function setNumJournee(int $num_journee): self
    {
        $this->num_journee = $num_journee;

        return $this;
    }

    public function getGymnase(): ?string
    {
        return $this->gymnase;
    }

    public function setGymnase(string $gymnase): self
    {
        $this->gymnase = $gymnase;

        return $this;
    }

    public function getEquipeLocale(): ?Equipe
    {
        return $this->equipe_locale;
    }

    public function setEquipeLocale(?Equipe $equipe_locale): self
    {
        $this->equipe_locale = $equipe_locale;

        return $this;
    }
}
