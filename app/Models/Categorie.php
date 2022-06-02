<?php

namespace App\Models;

class Categorie extends Model {

    protected $table = 'categorie';

    public function getActiviteByCategorie(): array {
        $stmt = $this->bd->getPDO()->query("
            SELECT * FROM categorie
            INNER JOIN activite ON activite.activite_categorie_id = categorie.categorie_id 
            WHERE categorie.categorie_id = ?", $this->id);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->bd]);
        return $stmt->fetchAll();
    }

}