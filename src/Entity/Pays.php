<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PaysRepository")
 */
class Pays
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $short;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\UserAdresses", mappedBy="Pays")
     */
    private $userAdresses;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\CommandeAdresses", mappedBy="Pays")
     */
    private $commandeAdresses;

    public function __construct()
    {
        $this->userAdresses = new ArrayCollection();
        $this->commandeAdresses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getShort(): ?string
    {
        return $this->short;
    }

    public function setShort(string $short): self
    {
        $this->short = $short;

        return $this;
    }

    /**
     * @return Collection|UserAdresses[]
     */
    public function getUserAdresses(): Collection
    {
        return $this->userAdresses;
    }

    public function addUserAdress(UserAdresses $userAdress): self
    {
        if (!$this->userAdresses->contains($userAdress)) {
            $this->userAdresses[] = $userAdress;
            $userAdress->setPays($this);
        }

        return $this;
    }

    public function removeUserAdress(UserAdresses $userAdress): self
    {
        if ($this->userAdresses->contains($userAdress)) {
            $this->userAdresses->removeElement($userAdress);
            // set the owning side to null (unless already changed)
            if ($userAdress->getPays() === $this) {
                $userAdress->setPays(null);
            }
        }

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
            $commandeAdress->setPays($this);
        }

        return $this;
    }

    public function removeCommandeAdress(CommandeAdresses $commandeAdress): self
    {
        if ($this->commandeAdresses->contains($commandeAdress)) {
            $this->commandeAdresses->removeElement($commandeAdress);
            // set the owning side to null (unless already changed)
            if ($commandeAdress->getPays() === $this) {
                $commandeAdress->setPays(null);
            }
        }

        return $this;
    }
}
