<?php

namespace App\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

class Reminder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: "User")]
    #[ORM\JoinColumn(name: "user_id", referencedColumnName: "id", nullable: false)]
    private ?User $user = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $description;

    #[ORM\Column(type: 'datetime')]
    private \DateTimeInterface $reminder_time;

    // Getters and setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getReminderTime(): \DateTimeInterface
    {
        return $this->reminder_time;
    }

    public function setReminderTime(\DateTimeInterface $reminder_time): self
    {
        $this->reminder_time = $reminder_time;
        return $this;
    }
}
