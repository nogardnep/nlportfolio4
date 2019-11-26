<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SubjectRepository")
 */
class Subject
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
     * @ORM\OneToMany(targetEntity="App\Entity\Speech", mappedBy="subject")
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
     * @return Collection|Speech[]
     */
    public function getSpeeches(): Collection
    {
        return $this->speeches;
    }

    public function addSpeech(Speech $speech): self
    {
        if (!$this->speeches->contains($speech)) {
            $this->speeches[] = $speech;
            $speech->setSubject($this);
        }

        return $this;
    }

    public function removeSpeech(Speech $speech): self
    {
        if ($this->speeches->contains($speech)) {
            $this->speeches->removeElement($speech);
            // set the owning side to null (unless already changed)
            if ($speech->getSubject() === $this) {
                $speech->setSubject(null);
            }
        }

        return $this;
    }
}
