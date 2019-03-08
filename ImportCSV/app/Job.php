<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = ['title', 'company', 'data_start', 'data_finish', 'candidate_id'];
}
