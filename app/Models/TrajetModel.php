<?php

namespace App\Models;

use CodeIgniter\Model;

class TrajetModel extends Model
{
    protected $table            = 'trajet';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['nom', 'id_bus'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
    public function getTrajetsEntreStations($depart, $arrivee)
    {
        $builder = $this->db->table('Trajet_Station ts')
                            ->join('Trajet t', 't.id = ts.trajet_id')
                            ->join('Station s', 's.id = ts.station_id')
                            ->where('ts.ordre_passage >=', $depart)
                            ->where('ts.ordre_passage <=', $arrivee)
                            ->orderBy('ts.ordre_passage', 'ASC');
        
        return $builder->get()->getResult();
    }
   
}
    

