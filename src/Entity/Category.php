<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
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
     * @ORM\OneToMany(targetEntity=Pizza::class, mappedBy="category")
     */
    private $pizzas;

    /**
     * @ORM\OneToMany(targetEntity=Drink::class, mappedBy="category")
     */
    private $drinks;

    /**
     * @ORM\OneToMany(targetEntity=Dessert::class, mappedBy="category")
     */
    private $desserts;

    /**
     * @ORM\OneToMany(targetEntity=Wine::class, mappedBy="category")
     */
    private $wines;

    /**
     * @ORM\OneToMany(targetEntity=IceCream::class, mappedBy="category")
     */
    private $iceCreams;

    public function __construct()
    {
        $this->pizzas = new ArrayCollection();
        $this->drinks = new ArrayCollection();
        $this->desserts = new ArrayCollection();
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
            $pizza->setCategory($this);
        }

        return $this;
    }

    public function removePizza(Pizza $pizza): self
    {
        if ($this->pizzas->removeElement($pizza)) {
            // set the owning side to null (unless already changed)
            if ($pizza->getCategory() === $this) {
                $pizza->setCategory(null);
            }
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
            $drink->setCategory($this);
        }

        return $this;
    }

    public function removeDrink(Drink $drink): self
    {
        if ($this->drinks->removeElement($drink)) {
            // set the owning side to null (unless already changed)
            if ($drink->getCategory() === $this) {
                $drink->setCategory(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Dessert[]
     */
    public function getDesserts(): Collection
    {
        return $this->desserts;
    }

    public function addDessert(Dessert $dessert): self
    {
        if (!$this->desserts->contains($dessert)) {
            $this->desserts[] = $dessert;
            $dessert->setCategory($this);
        }

        return $this;
    }

    public function removeDessert(Dessert $dessert): self
    {
        if ($this->desserts->removeElement($dessert)) {
            // set the owning side to null (unless already changed)
            if ($dessert->getCategory() === $this) {
                $dessert->setCategory(null);
            }
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
            $wine->setCategory($this);
        }

        return $this;
    }

    public function removeWine(Wine $wine): self
    {
        if ($this->wines->removeElement($wine)) {
            // set the owning side to null (unless already changed)
            if ($wine->getCategory() === $this) {
                $wine->setCategory(null);
            }
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
            $iceCream->setCategory($this);
        }

        return $this;
    }

    public function removeIceCream(IceCream $iceCream): self
    {
        if ($this->iceCreams->removeElement($iceCream)) {
            // set the owning side to null (unless already changed)
            if ($iceCream->getCategory() === $this) {
                $iceCream->setCategory(null);
            }
        }

        return $this;
    }
}
