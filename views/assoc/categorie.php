<h1>Nos activités <?= $params['categorieById']->categorie_nom ?></h1>

    <div class="card mb-3">
        <div class="card-body">
            <h2>Nom : <?= $params['categorieById']->activite_nom ?></h2>
            <small class="text-info">Difficulté : <?= $params['categorieById']->activite_difficulte ?></small>
            <p>Description : <?= $params['categorieById']->activite_description ?></p>
            <a href="/activites/<?= $params['categorieById']->id ?>" class="btn btn-primary">En savoir plus</a>
        </div>
    </div>
