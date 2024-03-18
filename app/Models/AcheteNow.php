<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AcheteNow extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $table = 'achete_nows';

    public function etatAchats()
    {
        return $this->belongsToMany(EtatAchat::class);
    }

    public function exigenceParticulieres()
    {
        return $this->belongsToMany(ExigenceParticuliere::class);
    }

    public function surfaceAnnexes()
    {
        return $this->belongsToMany(SurfaceAnnexe::class);
    }
}
