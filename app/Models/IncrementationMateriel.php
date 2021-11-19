<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncrementationMateriel extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'incrementation_materiels';

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'materiel_id',
        'quantite',
        'date',
        'provenance_id',
        'prix_unitaire',
        'date_peremption',
        'fabriquant_id',
        'destination_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function materiel()
    {
        return $this->belongsTo(Materiel::class, 'materiel_id');
    }

    public function getDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function provenance()
    {
        return $this->belongsTo(Fournisseur::class, 'provenance_id');
    }

    public function fabriquant()
    {
        return $this->belongsTo(Fabriquant::class, 'fabriquant_id');
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
