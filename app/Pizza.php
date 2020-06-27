<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ingredients','price','user_id'
    ];
    protected $casts = [
        'ingredients' => 'array'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
