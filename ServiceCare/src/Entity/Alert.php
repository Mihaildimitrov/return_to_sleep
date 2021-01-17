<?php

namespace App\Entity;

use App\Repository\AlertRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AlertRepository::class)
 */
class Alert
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=1024)
     */
    private $text;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\OneToOne(targetEntity=ServiceStatus::class, inversedBy="alert", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $status_id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_seen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getStatusId(): ?ServiceStatus
    {
        return $this->status_id;
    }

    public function setStatusId(ServiceStatus $status_id): self
    {
        $this->status_id = $status_id;

        return $this;
    }

    public function getIsSeen(): ?bool
    {
        return $this->is_seen;
    }

    public function setIsSeen(bool $is_seen): self
    {
        $this->is_seen = $is_seen;

        return $this;
    }
}
