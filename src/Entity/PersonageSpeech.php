<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonageSpeechRepository")
 */
class PersonageSpeech extends Speech
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Personage", inversedBy="speeches")
     */
    private $personage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $context;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonage(): ?Personage
    {
        return $this->personage;
    }

    public function setPersonage(?Personage $personage): self
    {
        $this->personage = $personage;

        return $this;
    }

    public function getContext(): ?string
    {
        return $this->context;
    }

    public function setContext(?string $context): self
    {
        $this->context = $context;

        return $this;
    }
}
