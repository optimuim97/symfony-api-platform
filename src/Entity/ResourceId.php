<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

trait ResourceId{
    
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    public function getId() : ?int
    {
        return $this->id;
    }

}