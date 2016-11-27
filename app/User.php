<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Book;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
     protected $casts = [
        'is_admin' => 'boolean',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isAdmin()
    {
        return $this->is_admin; // this looks for an admin column in your users table
    }
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
