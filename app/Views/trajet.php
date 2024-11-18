<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélectionner un Trajet</title>
</head>
<body>
    <h1>Sélectionner un Trajet</h1>

    <!-- Formulaire de sélection de stations -->
    <form action="/station/resultat" method="post">
        <label for="station_depart">Station de départ:</label>
        <select name="station_depart" id="station_depart">
            <?php foreach ($stations as $station): ?>
                <option value="<?= $station['id'] ?>"><?= $station['nom'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="station_arrivee">Station d'arrivée:</label>
        <select name="station_arrivee" id="station_arrivee">
            <?php foreach ($stations as $station): ?>
                <option value="<?= $station['id'] ?>"><?= $station['nom'] ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Rechercher</button>
    </form>

    <!-- Affichage des trajets -->
    <?php if (isset($trajets) && !empty($trajets)): ?>
        <h2>Trajets disponibles</h2>
        <ul>
            <?php foreach ($trajets as $trajet): ?>
                <li>
                    <strong>Trajet:</strong> <?= $trajet->nom ?> <br>
                    <strong>Bus:</strong> <?= $trajet->bus_id ?> <br>
                    <strong>Stations entre:</strong>
                    <?php
                    // Afficher les stations entre départ et arrivée
                    foreach ($trajets as $station) {
                        echo $station->nom . " ";
                    }
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
