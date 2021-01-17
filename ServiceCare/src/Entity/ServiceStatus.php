<?php

namespace App\Entity;

use App\Repository\ServiceStatusRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ServiceStatusRepository::class)
 */
class ServiceStatus
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Service::class, mappedBy="serviceStatus")
     */
    private $service_id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date_checked;

    /**
     * @ORM\Column(type="smallint")
     */
    private $http_code;

    /**
     * @ORM\Column(type="float")
     */
    private $request_timeout;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $request_type;

    /**
     * @ORM\OneToOne(targetEntity=Alert::class, mappedBy="status_id", cascade={"persist", "remove"})
     */
    private $alert;

    public function __construct()
    {
        $this->service_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServiceId(): Collection
    {
        return $this->service_id;
    }

    public function addServiceId(Service $serviceId): self
    {
        if (!$this->service_id->contains($serviceId)) {
            $this->service_id[] = $serviceId;
            $serviceId->setServiceStatus($this);
        }

        return $this;
    }

    public function removeServiceId(Service $serviceId): self
    {
        if ($this->service_id->removeElement($serviceId)) {
            // set the owning side to null (unless already changed)
            if ($serviceId->getServiceStatus() === $this) {
                $serviceId->setServiceStatus(null);
            }
        }

        return $this;
    }

    public function getDateChecked(): ?\DateTimeInterface
    {
        return $this->date_checked;
    }

    public function setDateChecked(\DateTimeInterface $date_checked): self
    {
        $this->date_checked = $date_checked;

        return $this;
    }

    public function getHttpCode(): ?int
    {
        return $this->http_code;
    }

    public function setHttpCode(int $http_code): self
    {
        $this->http_code = $http_code;

        return $this;
    }

    public function getRequestTimeout(): ?float
    {
        return $this->request_timeout;
    }

    public function setRequestTimeout(float $request_timeout): self
    {
        $this->request_timeout = $request_timeout;

        return $this;
    }

    public function getRequestType(): ?string
    {
        return $this->request_type;
    }

    public function setRequestType(string $request_type): self
    {
        $this->request_type = $request_type;

        return $this;
    }

    public function getAlert(): ?Alert
    {
        return $this->alert;
    }

    public function setAlert(Alert $alert): self
    {
        // set the owning side of the relation if necessary
        if ($alert->getStatusId() !== $this) {
            $alert->setStatusId($this);
        }

        $this->alert = $alert;

        return $this;
    }
}
