<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Epreuve extends Model
{
    use HasFactory;

    protected $table = 'epreuves'; // Specify the table name


    public $incrementing = false; // Set to false if 'numero' is not an auto-incrementing integer

    protected $fillable = [
        'numero',
        'date',
        'lieu',
        'matiere_id', 
    ];

    // Define the relationship to Matiere
    public function matiere(): BelongsTo
    {
        return $this->belongsTo(Matiere::class, 'matiere_id', 'id'); // Adjusted to use 'code'
    }
}
