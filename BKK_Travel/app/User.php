<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';
    protected $fillable = [
        'Fname','Lname', 'email', 'password','gender','birthday','type',
    ];
    protected $primaryKey = 'user_id';

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function getAuthIdentifier()
    {
        return $this->email;
    }
    public function getAuthPassword() {
        return $this->password;
    }
    public function review(){
        $this->hasOne('Review');
    }

}
