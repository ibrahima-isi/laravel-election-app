<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperProgramme
 */
class Programme extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function candidat(): BelongsTo
    {
        return $this->belongsTo(Candidat::class, 'candidat_id');
    }

    public function secteurs(): BelongsToMany
    {
        return $this->belongsToMany(
            Secteur::class,
            'programme_secteur',
            'secteur_id',
        'programme_id');
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

}
