<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $candidates = Candidate::get();

      return view( 'candidates', [ 'candidates' => $candidates]);
    }
    /**
    *
    * Import File CSV Candidates
    * Save data in DB
    *
    */
    function importCandidateCSV()
    {
      $path = public_path('storage/candidates.csv');

      $lines = file($path);
      $utf8_lines = array_map('utf8_encode', $lines);
      $contents = array_map('str_getcsv', $utf8_lines);

      $data = [];
      foreach ($contents as $value) {

        $data[] = array(
                        'name'        => $value[1],
                        'last_name'   => $value[2],
                        'email'       => $value[3],
                      );

      }

      dd($data);
      //return $this->saveCandidate($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ARRAY $candidate
     * @return \Illuminate\Http\Response
     */
     function saveCandidate ($candidate)
    {

        try {

          return Candidate::insert($candidate);

        } catch (\Exception $e) {

          return $e;

        }

    }

}
