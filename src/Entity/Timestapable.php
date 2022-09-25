<?php
namespace App\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

trait Timestapable{

    #[ORM\Column(type:"datetime")]
    private \DateTimeInterface $createdAt;

    #[ORM\Column(type:"datetime")]
    private ?\DateTimeInterface $updatedAt;
    
    public function getCreatedAt() : \DateTimeInterface
    {
        return $this->createdAt;
    }

    public function getUpdatedAt() : ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt)
    {
        $this->createdAt = $createdAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt)
    {   
        $this->updatedAt =$updatedAt;
    }
}