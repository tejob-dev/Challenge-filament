<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EtatAchat extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $table = 'etat_achats';

    public function acheteNows()
    {
        return $this->belongsToMany(AcheteNow::class);
    }
}
