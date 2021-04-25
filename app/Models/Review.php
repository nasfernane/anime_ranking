<?php

// définit l'emplacement du fichier pour son utilisation extérieure
namespace App\Models;

// import des classes utilisées
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// création du modèle Review basée sur la classe préexistante Model
class Review extends Model
{
    protected $fillable = ['content', 'note', 'user_name', 'user_id', 'anime_id'];
}
