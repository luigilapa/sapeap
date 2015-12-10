<?php

namespace asoabo;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lawyer extends Model
{
    use SoftDeletes;

    protected $table = 'lawyer';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['identification', 'registration_number','first_name', 'last_name', 'gender', 'email', 'address','telephone', 'last_name','mobile', 'user', 'type', 'password'];

    protected $dates = ['deleted_at'];
}
