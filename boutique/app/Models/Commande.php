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
        'user_id',
    ];
    

    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_commande')
                    ->withPivot('quantity')
                    ->withTimestamps();
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
