<?php

namespace App\Adapters\Gateway\Doctrine\ORM\Entity;

use App\Adapters\Gateway\Doctrine\ORM\HealthReportRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: HealthReportRepository::class)]
#[ApiResource]
class HealthReport
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'healthReports')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $generated_date = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $report_details = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getGeneratedDate(): ?\DateTimeInterface
    {
        return $this->generated_date;
    }

    public function setGeneratedDate(\DateTimeInterface $generated_date): static
    {
        $this->generated_date = $generated_date;

        return $this;
    }

    public function getReportDetails(): ?string
    {
        return $this->report_details;
    }

    public function setReportDetails(?string $report_details): static
    {
        $this->report_details = $report_details;

        return $this;
    }
}
