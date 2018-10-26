<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Casino;
use Illuminate\View\View;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index(): View
    {
        $casinos = Casino::all();
        return view('home', compact('casinos'));
    }

    /**
     * Show the application dashboard.
     *
     * @param Request $request
     * @return View
     */
    public function closestCasino(Request $request): View
    {
        // Validation
        $rules = [
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric'
        ];
        $messages = [
            'latitude.required' => 'Please input latitude',
            'latitude.numeric' => 'Please input a numeric latitude',
            'longitude.required' => 'Please input longitude',
            'longitude.numeric' => 'Please input a numeric longitude'
        ];
        $request->validate($rules, $messages);


        // get every casino
        $casinos = Casino::all();

        $lowestDistance = -1;
        $lowestID = 0;

        // loop through each casino
        foreach ($casinos as $casino) {

            // find distance between casino and specified location
            $distance = $casino->distance(floatval($request->latitude), floatval($request->longitude));

            // determine if it is the lowest
            if ($distance < $lowestDistance || $lowestDistance == -1) {
                $lowestDistance = $distance;
                $lowestID = $casino->id;
            }
        }


        // get the details of the closest casino
        $casinos = Casino::where('id','=', $lowestID)->get();

        // get the user input details
        $latitude = $request->latitude;
        $longitude = $request->longitude;


        return view('home', compact('casinos','latitude','longitude'));
    }
}
