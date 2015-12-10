<?php

namespace asoabo;

use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    protected $table = 'contributions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['amount', 'year','month', 'date', 'description', 'lawyer_id', 'user_id'];
}
