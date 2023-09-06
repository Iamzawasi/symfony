<?php

namespace App\Entity;

use App\Repository\CurrencyRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CurrencyRepository::class)]
class Currency
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 11)]
    private ?string $currencyShort = null;

    #[ORM\Column(length: 15)]
    private ?string $region = null;

    #[ORM\Column(length: 250, nullable: true)]
    private ?string $remark = null;

    #[ORM\OneToMany(mappedBy: 'currency', targetEntity: Account::class, orphanRemoval: true)]
    private Collection $account;

    public function __construct()
    {
        $this->account = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCurrencyShort(): ?string
    {
        return $this->currencyShort;
    }

    public function setCurrencyShort(string $currencyShort): static
    {
        $this->currencyShort = $currencyShort;

        return $this;
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function setRegion(string $region): static
    {
        $this->region = $region;

        return $this;
    }

    public function getRemark(): ?string
    {
        return $this->remark;
    }

    public function setRemark(?string $remark): static
    {
        $this->remark = $remark;

        return $this;
    }

    /**
     * @return Collection<int, Account>
     */
    public function getAccount(): Collection
    {
        return $this->account;
    }

    public function addAccount(Account $account): static
    {
        if (!$this->account->contains($account)) {
            $this->account->add($account);
            $account->setCurrency($this);
        }

        return $this;
    }

    public function removeAccount(Account $account): static
    {
        if ($this->account->removeElement($account)) {
            // set the owning side to null (unless already changed)
            if ($account->getCurrency() === $this) {
                $account->setCurrency(null);
            }
        }

        return $this;
    }
}
