<?php

namespace App\Entity\HRMSystem\HRM_System_Setup;

use App\Entity\User;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\HRMSystem\HRM_System_Setup\AllowanceRepository;

#[ORM\Entity(repositoryClass: AllowanceRepository::class)]
class Allowance
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $allowance = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: "allowance")]
    #[ORM\JoinColumn(name: "user_id", referencedColumnName: "id")]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAllowance(): ?string
    {
        return $this->allowance;
    }

    public function setAllowance(string $allowance): static
    {
        $this->allowance = $allowance;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
