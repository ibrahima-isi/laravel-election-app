<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @mixin IdeHelperCandidat
 */
class Candidat extends Model
{
//    protected  $table = "candidats";
    use HasFactory;

//    protected $fillable = [
//        'nom', 'prenom', 'biographie', ''
//    ];
/// the $guarded property help define if a field can not be fulfilled
    protected $guarded = [];

    public function programmes(){
        return $this->hasOne(Programme::class, 'candidat_id');
    }

}
