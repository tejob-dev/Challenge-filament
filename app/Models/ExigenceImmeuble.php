<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExigenceImmeuble extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $table = 'exigence_immeubles';

    public function maisonCertifs()
    {
        return $this->belongsToMany(MaisonCertif::class);
    }
}
