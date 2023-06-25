<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuHasCategory extends Model
{
    use HasFactory;

    protected $table = 'menu_has_category';

    // Définis les colonnes que tu souhaites utiliser
    protected $fillable = ['menu_id', 'category_id'];
}
