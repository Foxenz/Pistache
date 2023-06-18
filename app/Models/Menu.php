<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menus';

    // Définis les colonnes que tu souhaites utiliser
    protected $fillable = ['name', 'status', 'date', 'categorie_id', 'url_image', 'price'];
}
