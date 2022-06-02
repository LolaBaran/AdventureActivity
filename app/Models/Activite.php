<?php

namespace App\Models;

class Activite extends Model {
    protected $table = 'activite';

    public function getExcerpt(): string {
        return substr($this->activite_description, 0, 175). '...';
    }

    public function getBtn(): string {
        return <<<HTML
        <a href="/activites/$this->id" class="btn btn-primary">Découvir l'activité</a>
HTML;

    }

    /*public function getCategorie() {
        $stmt = $this->bd->getPDO()->query("
            SELECT * FROM categorie 
            INNER JOIN act_cat ON categorie.categorie_id = act_cat.categorie_id
            INNER JOIN activite ON act_cat.activite_id = activite.id    
            WHERE activite.id  = ?", $this->id);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->bd]);
        return $stmt->fetchAll();
    }*/
}