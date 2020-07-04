<?php

namespace App\Entity;

use App\Repository\DepartmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DepartmentRepository::class)
 */
class Department
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", unique=true)
     */
    private $dep_number;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $dep_name;

    /**
     * @ORM\OneToMany(targetEntity=Employee::class, mappedBy="department")
     */
    private $employee;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="departments")
     */
    private $category;

    public function __construct()
    {
        $this->employee = new ArrayCollection();
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDepNumber(): ?int
    {
        return $this->dep_number;
    }

    public function setDepNumber(int $dep_number): self
    {
        $this->dep_number = $dep_number;

        return $this;
    }

    public function getDepName(): ?string
    {
        return $this->dep_name;
    }

    public function setDepName(?string $dep_name): self
    {
        $this->dep_name = $dep_name;

        return $this;
    }

    /**
     * @return Collection|Employee[]
     */
    public function getEmployee(): Collection
    {
        return $this->employee;
    }

    public function addEmployee(Employee $employee): self
    {
        if (!$this->employee->contains($employee)) {
            $this->employee[] = $employee;
            $employee->setDepartment($this);
        }

        return $this;
    }

    public function removeEmployee(Employee $employee): self
    {
        if ($this->employee->contains($employee)) {
            $this->employee->removeElement($employee);
            // set the owning side to null (unless already changed)
            if ($employee->getDepartment() === $this) {
                $employee->setDepartment(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
    }

    public function __toString() : string
    {
        return $this->dep_number;
    }

    public function addCategory(Product $category): self
    {
        if (!$this->category->contains($category)) {
            $this->category[] = $category;
        }

        return $this;
    }

    public function removeCategory(Product $category): self
    {
        if ($this->category->contains($category)) {
            $this->category->removeElement($category);
        }

        return $this;
    }
}
