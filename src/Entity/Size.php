<?php

namespace App\Entity;

use App\Repository\SizeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SizeRepository::class)
 */
class Size
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
    private $size;

    /**
     * @ORM\ManyToMany(targetEntity=Pizza::class, mappedBy="size")
     */
    private $pizzas;

    /**
     * @ORM\ManyToMany(targetEntity=Drink::class, mappedBy="size")
     */
    private $drinks;

    /**
     * @ORM\ManyToMany(targetEntity=Wine::class, mappedBy="size")
     */
    private $wines;

    public function __construct()
    {
        $this->pizzas = new ArrayCollection();
        $this->drinks = new ArrayCollection();
        $this->wines = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->getSize();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    /**
     * @return Collection|Pizza[]
     */
    public function getPizzas(): Collection
    {
        return $this->pizzas;
    }

    public function addPizza(Pizza $pizza): self
    {
        if (!$this->pizzas->contains($pizza)) {
            $this->pizzas[] = $pizza;
            $pizza->addSize($this);
        }

        return $this;
    }

    public function removePizza(Pizza $pizza): self
    {
        if ($this->pizzas->removeElement($pizza)) {
            $pizza->removeSize($this);
        }

        return $this;
    }

    /**
     * @return Collection|Drink[]
     */
    public function getDrinks(): Collection
    {
        return $this->drinks;
    }

    public function addDrink(Drink $drink): self
    {
        if (!$this->drinks->contains($drink)) {
            $this->drinks[] = $drink;
            $drink->addSize($this);
        }

        return $this;
    }

    public function removeDrink(Drink $drink): self
    {
        if ($this->drinks->removeElement($drink)) {
            $drink->removeSize($this);
        }

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
            $wine->addSize($this);
        }

        return $this;
    }

    public function removeWine(Wine $wine): self
    {
        if ($this->wines->removeElement($wine)) {
            $wine->removeSize($this);
        }

        return $this;
    }
}
