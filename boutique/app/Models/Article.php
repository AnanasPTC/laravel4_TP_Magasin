<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'description',
        'prix',
        'stock',
    ];

    public function commandes()
    {
        return $this->belongsToMany(Commande::class, 'article_commande')
                    ->withPivot('quantity');
    }

}
