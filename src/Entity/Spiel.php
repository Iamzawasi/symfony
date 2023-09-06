<?php

namespace App\Entity;

use App\Repository\SpielRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SpielRepository::class)]
class Spiel
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $spiedid = null;

    #[ORM\Column(nullable: true)]
    private ?int $neue_bewegung = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSpiedid(): ?int
    {
        return $this->spiedid;
    }

    public function setSpiedid(int $spiedid): static
    {
        $this->spiedid = $spiedid;

        return $this;
    }

    public function getNeueBewegung(): ?int
    {
        return $this->neue_bewegung;
    }

    public function setNeueBewegung(?int $neue_bewegung): static
    {
        $this->neue_bewegung = $neue_bewegung;

        return $this;
    }
}
