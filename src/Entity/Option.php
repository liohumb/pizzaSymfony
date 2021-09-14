<?php

namespace App\Entity;

use App\Repository\OptionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OptionRepository::class)
 * @ORM\Table(name="`option`")
 */
class Option
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Wine::class, mappedBy="color")
     */
    private $wines;

    /**
     * @ORM\ManyToMany(targetEntity=IceCream::class, mappedBy="parfum")
     */
    private $iceCreams;

    public function __construct()
    {
        $this->wines = new ArrayCollection();
        $this->iceCreams = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getName();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Wine[]
     */
    public function getWines(): Collection
    {
        return $this->wines;
    }

    public function addWine(Wine $wine): self
    {
        if (!$this->wines->contains($wine)) {
            $this->wines[] = $wine;
            $wine->addColor($this);
        }

        return $this;
    }

    public function removeWine(Wine $wine): self
    {
        if ($this->wines->removeElement($wine)) {
            $wine->removeColor($this);
        }

        return $this;
    }

    /**
     * @return Collection|IceCream[]
     */
    public function getIceCreams(): Collection
    {
        return $this->iceCreams;
    }

    public function addIceCream(IceCream $iceCream): self
    {
        if (!$this->iceCreams->contains($iceCream)) {
            $this->iceCreams[] = $iceCream;
            $iceCream->addParfum($this);
        }

        return $this;
    }

    public function removeIceCream(IceCream $iceCream): self
    {
        if ($this->iceCreams->removeElement($iceCream)) {
            $iceCream->removeParfum($this);
        }

        return $this;
    }
}
