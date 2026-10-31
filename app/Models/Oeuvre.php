<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Oeuvre extends Model
{
    use HasFactory;

    /** Valeur en base => libellé affiché */
    public const STATUTS = [
        'en_cours' => 'En cours',
        'termine' => 'Terminé',
        'a_venir' => 'À venir',
    ];

    protected $fillable = [
        'titre',
        'synopsis',
        'annee',
        'status',
        'nb_episodes_tomes',
        'studio',
        'image',
        'note',
    ];

    protected $casts = [
        'note' => 'float',
    ];

    /** Oeuvre::filtre('termine', 2020) : chaque critère ne s'applique que s'il est renseigné */
    public function scopeFiltre(Builder $query, ?string $status, ?int $annee): void
    {
        $query
            ->when($status, fn (Builder $q) => $q->where('status', $status))
            ->when($annee, fn (Builder $q) => $q->where('annee', $annee));
    }
}
