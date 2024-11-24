<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Matiere extends Model
{
    use HasFactory;





    protected $fillable = [
        'id',
        'code',
        'libelle',
        'coef',
    ];

    public function epreuves(): HasMany
    {
        return $this->hasMany(Epreuve::class, 'matiere_id', 'id'); 
    }
}
