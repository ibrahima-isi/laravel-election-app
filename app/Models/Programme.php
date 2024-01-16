<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperProgramme
 */
class Programme extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }

    public function secteurs()
    {
        return $this->belongsToMany(Secteur::class);
    }

}
