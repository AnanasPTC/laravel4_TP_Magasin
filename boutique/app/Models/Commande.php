<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'montant_total',
        'id_client',
    ];

    public function Article()
    {
        return $this->belongsToMany(Article::class, 'article_commande')
                    ->withPivot('quantity');
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
