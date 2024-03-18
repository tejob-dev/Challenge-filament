<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaisonCertif extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $table = 'maison_certifs';

    public function typeDeSurfaces()
    {
        return $this->belongsToMany(TypeDeSurface::class);
    }

    public function critereImmeubles()
    {
        return $this->belongsToMany(CritereImmeuble::class);
    }

    public function exigenceImmeubles()
    {
        return $this->belongsToMany(ExigenceImmeuble::class);
    }
}
