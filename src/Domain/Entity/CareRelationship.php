<?php

namespace App\Domain\Entity;

use App\Domain\Repository\CareRelationshipRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CareRelationshipRepository::class)]
class CareRelationship
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: "User")]
    #[ORM\JoinColumn(name: "elderly_id", referencedColumnName: "id", nullable: false)]
    private ?User $elderly = null;

    #[ORM\ManyToOne(targetEntity: "User")]
    #[ORM\JoinColumn(name: "caregiver_id", referencedColumnName: "id", nullable: false)]
    private ?User $caregiver = null;

    #[ORM\Column]
    private ?bool $confirmed = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $start_date = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $end_date = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getElderly(): ?User
    {
        return $this->elderly;
    }

    public function setElderly(?User $elderly): self
    {
        $this->elderly = $elderly;
        return $this;
    }

    public function getCaregiver(): ?User
    {
        return $this->caregiver;
    }

    public function setCaregiver(?User $caregiver): self
    {
        $this->caregiver = $caregiver;
        return $this;
    }

    public function isConfirmed(): ?bool
    {
        return $this->confirmed;
    }

    public function setConfirmed(bool $confirmed): static
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->start_date;
    }

    public function setStartDate(\DateTimeInterface $start_date): static
    {
        $this->start_date = $start_date;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->end_date;
    }

    public function setEndDate(\DateTimeInterface $end_date): static
    {
        $this->end_date = $end_date;

        return $this;
    }
}
