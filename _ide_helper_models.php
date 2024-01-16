<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Candidat
 *
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $parti
 * @property string $biographie
 * @property bool $validation
 * @property string $photo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereBiographie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereParti($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Candidat whereValidation($value)
 * @mixin \Eloquent
 */
	class IdeHelperCandidat {}
}

namespace App\Models{
/**
 * App\Models\Electeur
 *
 * @property int $id
 * @property string $nom
 * @property string $prenom
 * @property string $CNI
 * @property string $adresse
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Electeur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Electeur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Electeur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Electeur whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Electeur whereCNI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Electeur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Electeur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Electeur whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Electeur wherePrenom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Electeur whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperElecteur {}
}

namespace App\Models{
/**
 * App\Models\Programme
 *
 * @property int $id
 * @property string $titre
 * @property string $contenu
 * @property string $document
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $delais
 * @method static \Illuminate\Database\Eloquent\Builder|Programme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Programme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Programme query()
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereContenu($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereDelais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereDocument($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Programme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperProgramme {}
}

namespace App\Models{
/**
 * App\Models\Secteur
 *
 * @property int $id
 * @property string $libelle
 * @property string $couleur
 * @property string $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur query()
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur whereCouleur($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur whereLibelle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Secteur whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperSecteur {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

