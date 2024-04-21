<?php

namespace App\Domain\Entity;

use Doctrine\ORM\Mapping as ORM;

class Attachment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: "Message")]
    #[ORM\JoinColumn(name: "message_id", referencedColumnName: "id", nullable: false)]
    private ?Message $message = null;

    #[ORM\Column(type: 'string', length: 255)]
    private string $file_path;

    // Getters and setters

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMessage(): ?Message
    {
        return $this->message;
    }

    public function setMessage(?Message $message): self
    {
        $this->message = $message;
        return $this;
    }

    public function getFilePath(): string
    {
        return $this->file_path;
    }

    public function setFilePath(string $file_path): self
    {
        $this->file_path = $file_path;
        return $this;
    }
}
