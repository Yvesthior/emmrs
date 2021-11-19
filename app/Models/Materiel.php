<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materiel extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'materiels';

    protected $dates = [
        'date_inventaire',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'lot',
        'id_unique',
        'code',
        'identifiant',
        'designation',
        'date_inventaire',
        'quantite',
        'marque',
        'modele',
        'numero_serie',
        'fabriquant_id',
        'representant_local_id',
        'prix_unitaire',
        'prix_total',
        'provenance_id',
        'destination_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function equipementSorties()
    {
        return $this->hasMany(Sorty::class, 'equipement_id', 'id');
    }

    public function getDateInventaireAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateInventaireAttribute($value)
    {
        $this->attributes['date_inventaire'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function fabriquant()
    {
        return $this->belongsTo(Fabriquant::class, 'fabriquant_id');
    }

    public function representant_local()
    {
        return $this->belongsTo(RepresentantsLocaux::class, 'representant_local_id');
    }

    public function provenance()
    {
        return $this->belongsTo(Site::class, 'provenance_id');
    }

    public function destination()
    {
        return $this->belongsTo(Site::class, 'destination_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
