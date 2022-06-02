<h1>Nos activités</h1>
<?php foreach ($params['activites'] as $activite): ?>
    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $activite->activite_nom ?></h2>
            <div>
                <small class="badge bg-info"><a href="/categorie/<?= $activite->categorie_id ?>" class="text-white"><?= $activite->categorie_nom ?><a/></small>
            </div>
            <small class="text-info"><?= $activite->activite_difficulte ?></small>
            <p><?= $activite->getExcerpt() ?></p>
            <?= $activite->getBtn() ?>
        </div>
    </div>
<?php endforeach;?>
