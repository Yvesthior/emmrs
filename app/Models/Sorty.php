<?php

namespace App\Models;

use \DateTimeInterface;
use App\Traits\Auditable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sorty extends Model
{
    use SoftDeletes;
    use Auditable;
    use HasFactory;

    public $table = 'sorties';

    protected $dates = [
        'date_sortie',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'equipement_id',
        'quantite',
        'date_sortie',
        'rubrique',
        'destination_id',
        'observation',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function equipement()
    {
        return $this->belongsTo(Materiel::class, 'equipement_id');
    }

    public function getDateSortieAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateSortieAttribute($value)
    {
        $this->attributes['date_sortie'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
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
