<?php

namespace App\Entity;

class Article
{
    private $id;
    private $libelle;
    public function __construct($id, $libelle = "sans")
    {
        $this->id = $id;
        $this->libelle = $libelle;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getLibelle()
    {
        return $this->libelle;
    }
}
