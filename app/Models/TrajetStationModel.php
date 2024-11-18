<?php

namespace App\Models;

use CodeIgniter\Model;

class TrajetModel extends Model
{
    protected $table = 'trajet_station'; // Table de liaison entre les trajets et les stations
    protected $primaryKey = 'id';
    protected $allowedFields = ['trajet_id', 'station_id', 'ordre_passage'];

    // Fonction pour récupérer les trajets entre 2 stations
    public function getRouteBetweenStations($stationDepart, $stationArrivee)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('trajet_station ts');
        $builder->select('t.nom AS trajet, s1.nom AS station_depart, s2.nom AS station_arrivee, ts1.ordre_passage AS ordre_depart, ts2.ordre_passage AS ordre_arrivee, h1.heure_passage AS heure_depart, h2.heure_passage AS heure_arrivee');
        $builder->join('trajet t', 'ts.trajet_id = t.id');
        $builder->join('station s1', 'ts.station_id = s1.id');
        $builder->join('station s2', 'ts.station_id = s2.id');
        $builder->join('horaire h1', 'h1.trajet_station_id = ts.id');
        $builder->join('horaire h2', 'h2.trajet_station_id = ts.id');
        $builder->where('s1.nom', $stationDepart);
        $builder->where('s2.nom', $stationArrivee);
        $query = $builder->get();

        return $query->getResult();
    }
}
