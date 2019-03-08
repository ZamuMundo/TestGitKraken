<?php

namespace App\Http\Controllers;

use App\Job;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
    *
    * Import File CSV Jobs
    * Save data in DB
    *
    */
    public function importJobCSV()
    {
      $path = public_path('storage/jobs.csv');

      $lines = file($path);
      $utf8_lines = array_map('utf8_encode', $lines);
      $contents = array_map('str_getcsv', $utf8_lines);

      $data = [];
      foreach ($contents as $value) {

        $data_start = str_replace ( '.' , '-' , $value[4]  );
        $data_start  = Carbon::parse($data_start);

        $data_finish = str_replace ( '.' , '-' , $value[5]  );
        $data_finish  = Carbon::parse($data_finish);

        $data[] = array(
                        'candidate_id'    => $value[1],
                        'title'           => $value[2],
                        'company'         => $value[3],
                        'data_start'      => $data_start,
                        'data_finish'     => $data_finish,
                      );
        echo $value[1] . ' ' . $value[2] . ' ' . $value[3] . ' ' . $data_start . ' ' . $data_finish . '<br>';
      }

      return $this->saveJob($data);
    }

    /**
   * save data new resource.
   *
   * @return \Illuminate\Http\Response
   */
  function saveJob($job)
  {

    try {

      Job::insert($job);

    } catch (\Exception $e) {

      return $e;

    }

  }

}
