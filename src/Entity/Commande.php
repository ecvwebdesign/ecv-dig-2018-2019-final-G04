<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Produit", inversedBy="commandes")
     */
    private $Produit;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommandeAdresses", mappedBy="Commande")
     */
    private $commandeAdresses;

    /**
     * @ORM\Column(type="integer")
     */
    private $commandeType;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    private $articles = [];


    public function __construct()
    {
        $this->Produit = new ArrayCollection();
        $this->commandeAdresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|CommandeAdresses[]
     */
    public function getCommandeAdresses(): Collection
    {
        return $this->commandeAdresses;
    }

    public function addCommandeAdress(CommandeAdresses $commandeAdress): self
    {
        if (!$this->commandeAdresses->contains($commandeAdress)) {
            $this->commandeAdresses[] = $commandeAdress;
            $commandeAdress->setCommande($this);
        }

        return $this;
    }

    public function removeCommandeAdress(CommandeAdresses $commandeAdress): self
    {
        if ($this->commandeAdresses->contains($commandeAdress)) {
            $this->commandeAdresses->removeElement($commandeAdress);
            // set the owning side to null (unless already changed)
            if ($commandeAdress->getCommande() === $this) {
                $commandeAdress->setCommande(null);
            }
        }

        return $this;
    }

    public function getCommandeType(): ?int
    {
        return $this->commandeType;
    }

    public function setCommandeType(int $commandeType): self
    {
        $this->commandeType = $commandeType;

        return $this;
    }

    public function getArticles(): ?array
    {
        return $this->articles;
    }

    public function setArticles(?array $articles): self
    {
        $this->articles = $articles;

        return $this;
    }

}
