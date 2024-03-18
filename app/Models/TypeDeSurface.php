<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypeDeSurface extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $table = 'type_de_surfaces';

    public function maisonCertifs()
    {
        return $this->belongsToMany(MaisonCertif::class);
    }
}
