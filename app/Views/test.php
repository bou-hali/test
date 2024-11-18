<!DOCTYPE html>
<html>
<head>
    <title>Choisir un Trajet</title>
</head>
<body>
    <h1>Choisir un Trajet</h1>
    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?= session()->getFlashdata('error') ?></p>
    <?php endif; ?>

    <form action="/station/resultat" method="post">

        <label for="station_depart">Station de départ :</label>
        <select name="station_depart" id="station_depart" required>
            <option value="">Sélectionner une station</option>
            <?php foreach ($stations as $station): ?>
                <option value="<?= $station['id'] ?>"><?= $station['nom'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="station_arrivee">Station d'arrivée :</label>
        <select name="station_arrivee" id="station_arrivee" required>
            <option value="">Sélectionner une station</option>
            <?php foreach ($stations as $station): ?>
                <option value="<?= $station['id'] ?>"><?= $station['nom'] ?></option>
            <?php endforeach; ?>
        </select>

        <button type="submit">Rechercher</button>
    </form>
</body>
</html>
