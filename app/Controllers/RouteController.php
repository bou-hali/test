<?php 

namespace App\Controllers;

use App\Models\StationModel;
use App\Models\TrajetModel;
use CodeIgniter\Controller;

class RouteController extends Controller{
        public function index()
        {
            // Charger les stations
            $stationModel = new StationModel();
            $data['stations'] = $stationModel->findAll();
    
            return view('test', $data);
        }
    
        public function rechercherTrajet()
        {
            // Récupérer les stations de départ et d'arrivée
            $depart = $this->request->getPost('station_depart');
            $arrivee = $this->request->getPost('station_arrivee');
    
            // Charger le modèle Trajet
            $trajetModel = new TrajetModel();
            $data['trajets'] = $trajetModel->getTrajetsEntreStations($depart, $arrivee);
    
            // Charger le modèle Station
            $stationModel = new StationModel();
            $data['stations'] = $stationModel->findAll();
    
            return view('trajet', $data);
        }
}
?>
