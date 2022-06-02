<?php

namespace App\Models;

use PDO;
use Bdd\BddConnection;

abstract class Model {

    protected $bd;
    protected $table;

    public function __construct(BddConnection $bd) {
        $this->bd = $bd;
    }

    // liste des catégories et leurs activités
    public function all(): array {
        $stmt = $this->bd->getPDO()->query("SELECT * FROM {$this->table} INNER JOIN categorie ON {$this->table}.activite_categorie_id = categorie.categorie_id ORDER BY id ASC");
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->bd]);
        return $stmt->fetchAll();
    }

    // liste des activités par ID
    public function findById(int $id): Model {
        $stmt = $this->bd->getPDO()->prepare("SELECT * FROM {$this->table} INNER JOIN categorie ON {$this->table}.activite_categorie_id = categorie.categorie_id WHERE id = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->bd]);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // list des catégories par ID et leurs activités
    public function findByCategorieId(int $id): Model {
        $stmt = $this->bd->getPDO()->prepare("
            SELECT * FROM categorie
            INNER JOIN activite ON activite.activite_categorie_id = categorie.categorie_id
            WHERE categorie.categorie_id = ?");
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->bd]);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}