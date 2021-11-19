<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicament extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public const TYPE_SELECT = [
        'medicament' => 'Médicament',
        'solute'     => 'Soluté',
        'dispositif' => 'Dispositif',
    ];

    public $table = 'medicaments';

    protected $dates = [
        'date_peremption',
        'date_reception',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'code',
        'identifiant',
        'designation',
        'lot',
        'type',
        'dci',
        'forme_id',
        'dosage_id',
        'conditionnement_id',
        'upc',
        'nombre_conditionnement',
        'total_unites',
        'prix_unitaire',
        'prix_total',
        'date_peremption',
        'classe_therapeutique_id',
        'fabriquant_id',
        'formule_id',
        'famille_id',
        'date_reception',
        'provenance_id',
        'fournisseur_id',
        'destination_id',
        'reference_id',
        'observation',
        'slug',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function forme()
    {
        return $this->belongsTo(Forme::class, 'forme_id');
    }

    public function dosage()
    {
        return $this->belongsTo(Dosage::class, 'dosage_id');
    }

    public function conditionnement()
    {
        return $this->belongsTo(Conditionnement::class, 'conditionnement_id');
    }

    public function getDatePeremptionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDatePeremptionAttribute($value)
    {
        $this->attributes['date_peremption'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function classe_therapeutique()
    {
        return $this->belongsTo(ClasseTherapeutique::class, 'classe_therapeutique_id');
    }

    public function fabriquant()
    {
        return $this->belongsTo(Fabriquant::class, 'fabriquant_id');
    }

    public function formule()
    {
        return $this->belongsTo(Formule::class, 'formule_id');
    }

    public function famille()
    {
        return $this->belongsTo(Famille::class, 'famille_id');
    }

    public function getDateReceptionAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateReceptionAttribute($value)
    {
        $this->attributes['date_reception'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function provenance()
    {
        return $this->belongsTo(Site::class, 'provenance_id');
    }

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class, 'fournisseur_id');
    }

    public function destination()
    {
        return $this->belongsTo(Site::class, 'destination_id');
    }

    public function reference()
    {
        return $this->belongsTo(Reference::class, 'reference_id');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
