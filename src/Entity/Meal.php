<?php

namespace App\Entity;

use App\Repository\MealRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MealRepository::class)]
class Meal
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $calories = null;

    #[ORM\ManyToOne(inversedBy: 'meals')]
    private ?User $createdBy = null;

    /**
     * @var Collection<int, MealLog>
     */
    #[ORM\OneToMany(targetEntity: MealLog::class, mappedBy: 'meal')]
    private Collection $mealLogs;

    public function __construct()
    {
        $this->mealLogs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getCalories(): ?int
    {
        return $this->calories;
    }

    public function setCalories(int $calories): static
    {
        $this->calories = $calories;

        return $this;
    }

    public function getCreatedBy(): ?User
    {
        return $this->createdBy;
    }

    public function setCreatedBy(?User $createdBy): static
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * @return Collection<int, MealLog>
     */
    public function getMealLogs(): Collection
    {
        return $this->mealLogs;
    }

    public function addMealLog(MealLog $mealLog): static
    {
        if (!$this->mealLogs->contains($mealLog)) {
            $this->mealLogs->add($mealLog);
            $mealLog->setMeal($this);
        }

        return $this;
    }

    public function removeMealLog(MealLog $mealLog): static
    {
        if ($this->mealLogs->removeElement($mealLog)) {
            // set the owning side to null (unless already changed)
            if ($mealLog->getMeal() === $this) {
                $mealLog->setMeal(null);
            }
        }

        return $this;
    }
}
