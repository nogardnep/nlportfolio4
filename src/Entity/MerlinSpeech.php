<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MerlinSpeechRepository")
 */
class MerlinSpeech
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subject;

    /**
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @ORM\Column(type="boolean")
     */
    private $truthful;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $last_occurrence;

    public function __construct()
    {
        $this->truthful = true;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): self
    {
        $this->subject = $subject;

        return $this;
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

    public function getTruthful(): ?bool
    {
        return $this->truthful;
    }

    public function setTruthful(bool $truthful): self
    {
        $this->truthful = $truthful;

        return $this;
    }

    public function getLastOccurrence(): ?\DateTimeInterface
    {
        return $this->last_occurrence;
    }

    public function setLastOccurrence(?\DateTimeInterface $last_occurrence): self
    {
        $this->last_occurrence = $last_occurrence;

        return $this;
    }
}
