<?php
namespace App\Controllers;

use App\Models\Activite;
use App\Models\Categorie;

class AssocController extends Controller {

    public function home() {
        return $this->view('assoc.home');
    }

    public function index()
    {
        $activite = new Activite($this->getBD());
        $activites = $activite->all();

        return $this->view('assoc.index', compact('activites'));
    }

    public function render(int $id)
    {
        $activites = new Activite($this->getBD());
        $activiteById = $activites->findById($id);

        return $this->view('assoc.render', compact('activiteById'));
    }

    public function categorie(int $id)
    {
        $categories = new Categorie($this->getBD());
        $categorieById = $categories->findByCategorieId($id);

        return $this->view('assoc.categorie', compact('categorieById'));
    }
}

/*$stmt = $this->bd->getPDO()->query('SELECT * FROM activites ORDER BY id DESC');
       $activites = $stmt->fetchAll();*/