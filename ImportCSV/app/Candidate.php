<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
  protected $fillable = ['name', 'email'];

  /**
  * Get the jobs for the candidate.
  */
  public function jobs()
  {
    return $this->hasMany('App\Job');
  }
}
