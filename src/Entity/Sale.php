<?php

namespace App\Entity;

use App\Repository\SaleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SaleRepository::class)
 */
class Sale
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $sale_date;

    /**
     * @ORM\Column(type="integer")
     */
    private $dep_number;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $prod_code;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $amount;

    /**
     * @ORM\ManyToMany(targetEntity=Product::class, inversedBy="sales")
     */
    private $category;

    public function __construct()
    {
        $this->category = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSaleDate(): ?\DateTimeInterface
    {
        return $this->sale_date;
    }

    public function setSaleDate(\DateTimeInterface $sale_date): self
    {
        $this->sale_date = $sale_date;

        return $this;
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

    public function getProdCode(): ?string
    {
        return $this->prod_code;
    }

    public function setProdCode(string $prod_code): self
    {
        $this->prod_code = $prod_code;

        return $this;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function __toString(): string
    {
        return ($this->sale_date)->format('Y-m-d');
    }

    public function setAmount(?float $amount): self
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * @return Collection|Product[]
     */
    public function getCategory(): Collection
    {
        return $this->category;
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
