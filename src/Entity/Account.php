<?php

namespace App\Entity;

use App\Repository\AccountRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AccountRepository::class)]
class Account
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 250)]
    private ?string $accountType = null;

    #[ORM\Column(length: 5)]
    private ?string $accountShort = null;

    #[ORM\ManyToOne(inversedBy: 'account')]
    #[ORM\JoinColumn(nullable: false)]
    private ?currency $currency = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccountType(): ?string
    {
        return $this->accountType;
    }

    public function setAccountType(string $accountType): static
    {
        $this->accountType = $accountType;

        return $this;
    }

    public function getAccountShort(): ?string
    {
        return $this->accountShort;
    }

    public function setAccountShort(string $accountShort): static
    {
        $this->accountShort = $accountShort;

        return $this;
    }

    public function getCurrency(): ?currency
    {
        return $this->currency;
    }

    public function setCurrency(?currency $currency): static
    {
        $this->currency = $currency;

        return $this;
    }
}
