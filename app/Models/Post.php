<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'src',
        'link',
        'type_id',
    ];

    //aggiungo la lettura delle tabella collegata

    //il progeto corrisponde a una sola categoria
    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
