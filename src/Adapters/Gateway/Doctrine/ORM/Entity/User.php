<?php

namespace App\Adapters\Gateway\Doctrine\ORM\Entity;

use App\Adapters\Gateway\Doctrine\ORM\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var Collection<int, Profile>
     */
    #[ORM\OneToMany(targetEntity: Profile::class, mappedBy: 'user')]
    private Collection $profiles;

    /**
     * @var Collection<int, MedicalAppointment>
     */
    #[ORM\OneToMany(targetEntity: MedicalAppointment::class, mappedBy: 'user', orphanRemoval: true)]
    private Collection $medicalAppointments;

    /**
     * @var Collection<int, HealthRecord>
     */
    #[ORM\OneToMany(targetEntity: HealthRecord::class, mappedBy: 'user')]
    private Collection $healthRecords;

    /**
     * @var Collection<int, EmergencyAlert>
     */
    #[ORM\OneToMany(targetEntity: EmergencyAlert::class, mappedBy: 'user')]
    private Collection $emergencyAlerts;

    /**
     * @var Collection<int, HealthReport>
     */
    #[ORM\OneToMany(targetEntity: HealthReport::class, mappedBy: 'user')]
    private Collection $healthReports;

    public function __construct()
    {
        $this->profiles = new ArrayCollection();
        $this->medicalAppointments = new ArrayCollection();
        $this->healthRecords = new ArrayCollection();
        $this->emergencyAlerts = new ArrayCollection();
        $this->healthReports = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @return Collection<int, Profile>
     */
    public function getProfiles(): Collection
    {
        return $this->profiles;
    }

    public function addProfile(Profile $profile): static
    {
        if (!$this->profiles->contains($profile)) {
            $this->profiles->add($profile);
            $profile->setUser($this);
        }

        return $this;
    }

    public function removeProfile(Profile $profile): static
    {
        if ($this->profiles->removeElement($profile)) {
            // set the owning side to null (unless already changed)
            if ($profile->getUser() === $this) {
                $profile->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, MedicalAppointment>
     */
    public function getMedicalAppointments(): Collection
    {
        return $this->medicalAppointments;
    }

    public function addMedicalAppointment(MedicalAppointment $medicalAppointment): static
    {
        if (!$this->medicalAppointments->contains($medicalAppointment)) {
            $this->medicalAppointments->add($medicalAppointment);
            $medicalAppointment->setUser($this);
        }

        return $this;
    }

    public function removeMedicalAppointment(MedicalAppointment $medicalAppointment): static
    {
        if ($this->medicalAppointments->removeElement($medicalAppointment)) {
            // set the owning side to null (unless already changed)
            if ($medicalAppointment->getUser() === $this) {
                $medicalAppointment->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, HealthRecord>
     */
    public function getHealthRecords(): Collection
    {
        return $this->healthRecords;
    }

    public function addHealthRecord(HealthRecord $healthRecord): static
    {
        if (!$this->healthRecords->contains($healthRecord)) {
            $this->healthRecords->add($healthRecord);
            $healthRecord->setUser($this);
        }

        return $this;
    }

    public function removeHealthRecord(HealthRecord $healthRecord): static
    {
        if ($this->healthRecords->removeElement($healthRecord)) {
            // set the owning side to null (unless already changed)
            if ($healthRecord->getUser() === $this) {
                $healthRecord->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, EmergencyAlert>
     */
    public function getEmergencyAlerts(): Collection
    {
        return $this->emergencyAlerts;
    }

    public function addEmergencyAlert(EmergencyAlert $emergencyAlert): static
    {
        if (!$this->emergencyAlerts->contains($emergencyAlert)) {
            $this->emergencyAlerts->add($emergencyAlert);
            $emergencyAlert->setUser($this);
        }

        return $this;
    }

    public function removeEmergencyAlert(EmergencyAlert $emergencyAlert): static
    {
        if ($this->emergencyAlerts->removeElement($emergencyAlert)) {
            // set the owning side to null (unless already changed)
            if ($emergencyAlert->getUser() === $this) {
                $emergencyAlert->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, HealthReport>
     */
    public function getHealthReports(): Collection
    {
        return $this->healthReports;
    }

    public function addHealthReport(HealthReport $healthReport): static
    {
        if (!$this->healthReports->contains($healthReport)) {
            $this->healthReports->add($healthReport);
            $healthReport->setUser($this);
        }

        return $this;
    }

    public function removeHealthReport(HealthReport $healthReport): static
    {
        if ($this->healthReports->removeElement($healthReport)) {
            // set the owning side to null (unless already changed)
            if ($healthReport->getUser() === $this) {
                $healthReport->setUser(null);
            }
        }

        return $this;
    }
}
