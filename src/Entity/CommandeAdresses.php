<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeAdressesRepository")
 */
class CommandeAdresses
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Commande", inversedBy="commandeAdresses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commande;

    /**
     * @ORM\Column(type="integer")
     */
    private $numeroVoie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $codePostal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Pays", inversedBy="commandeAdresses")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pays;

    /**
     * @ORM\Column(type="integer")
     */
    private $adresseType;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommande(): ?Commande
    {
        return $this->commande;
    }

    public function setCommande(?Commande $commande): self
    {
        $this->commande = $commande;

        return $this;
    }

    public function getNumeroVoie(): ?int
    {
        return $this->numeroVoie;
    }

    public function setNumeroVoie(int $numeroVoie): self
    {
        $this->numeroVoie = $numeroVoie;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

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

    public function getPays(): ?Pays
    {
        return $this->pays;
    }

    public function setPays(?Pays $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    public function getAdresseType(): ?int
    {
        return $this->adresseType;
    }

    public function setAdresseType(int $adresseType): self
    {
        $this->adresseType = $adresseType;

        return $this;
    }
}
