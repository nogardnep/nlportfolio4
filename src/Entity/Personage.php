<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PersonageRepository")
 */
class Personage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\PersonageSpeech", mappedBy="personage")
     */
    private $speeches;

    public function __construct()
    {
        $this->speeches = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->title;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection|PersonageSpeech[]
     */
    public function getSpeeches(): Collection
    {
        return $this->speeches;
    }

    public function addSpeech(PersonageSpeech $speech): self
    {
        if (!$this->speeches->contains($speech)) {
            $this->speeches[] = $speech;
            $speech->setPersonage($this);
        }

        return $this;
    }

    public function removeSpeech(PersonageSpeech $speech): self
    {
        if ($this->speeches->contains($speech)) {
            $this->speeches->removeElement($speech);
            // set the owning side to null (unless already changed)
            if ($speech->getPersonage() === $this) {
                $speech->setPersonage(null);
            }
        }

        return $this;
    }
}
