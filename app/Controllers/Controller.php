<?php

namespace App\Controllers;

use Bdd\BddConnection;

abstract class Controller {

    protected $bd;

    public function __construct(BddConnection $bd)
    {
        $this->bd = $bd;
    }

    protected function view(string $path, array $params = null) {

        ob_start();

        $path = str_replace('.', DIRECTORY_SEPARATOR, $path);
        require VIEWS . $path . '.php';

        $content = ob_get_clean();
        require VIEWS . 'layout.php';

    }

    protected function getBD() {
        return $this->bd;
    }
}