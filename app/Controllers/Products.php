<?php

namespace App\Controllers;

use App\Models\TrajetModel;

class BusController extends BaseController
{
    protected $trajetModel;

    // Constructeur pour charger le modèle
    public function __construct()
    {
        $this->trajetModel = new TrajetModel();  // Utilisation du modèle TrajetModel
    }

    // Affiche la page de recherche de trajet
    public function index()
    {
        return view('recherche_trajet');  // Charge la vue pour rechercher un trajet
    }

    // Fonction pour récupérer les trajets entre deux stations
    public function get_trajet()
    {
        // Récupère les stations de départ et d'arrivée depuis la requête POST
        $station_depart = $this->request->getPost('station_depart');
        $station_arrivee = $this->request->getPost('station_arrivee');

        // Vérifie si les deux stations sont présentes
        if (empty($station_depart) || empty($station_arrivee)) {
            return redirect()->back()->with('error', 'Veuillez sélectionner les deux stations.');
        }

        // Appelle le modèle pour récupérer les trajets entre les stations
        $data['trajets'] = $this->trajetModel->getTrajetsBetweenStations($station_depart, $station_arrivee);

        // Si aucun trajet trouvé
        if (empty($data['trajets'])) {
            return redirect()->back()->with('error', 'Aucun trajet trouvé entre ces stations.');
        }

        // Charge la vue avec les trajets trouvés
        return view('test', $data);
    }
}
