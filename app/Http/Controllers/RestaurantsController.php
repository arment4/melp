<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use League\Csv\Reader;
use League\Csv\Statement;

class RestaurantsController extends Controller
{
    //

    public function index(){
    	$restaurants = Restaurant::all();


    	return view('restaurants.show',compact('restaurants'));
    }

    public function show(Restaurant $restaurant){

        return view('restaurants.show',compact('restaurant'));

    }

    public function search( Request $request ){

        $latitude  = $request->latitude;
        $longitude = $request->longitude;
        $radius = $request->radius;
        $restaurants = Restaurant::all();
        $insideArray=[];
        $ratingArray=[];
        $distanceArray=[];

        foreach ($restaurants as $restaurant) {
            $distance=$this->distanceBtwTwoPoints($latitude,$longitude,$restaurant->lat,$restaurant->lng);
            array_push($distanceArray,$distance);
            if ($distance<$radius) {
                array_push($insideArray,$restaurant->toArray());
                array_push($ratingArray,$restaurant->rating);
            }
        }
        $average = array_sum($ratingArray)/count($insideArray);
        $std = $this->stats_standard_deviation($ratingArray);
        $arr = array('count' => count($insideArray), 'avg' => $average, 'std' => 3);

        return $arr;

    }

     public function create(){
    
     	return view('restaurants.create');
     }

    public function edit($id){

        $restaurant = Restaurant::findorFail($id);

        return view('restaurants.edit',compact('restaurant'));

    }

    public function update(Restaurant $restaurant){
        $restaurant->name = request('name');
        $restaurant->phone = request('phone');
        $restaurant->site = request('site');
        $restaurant->email = request('email');
        $restaurant->rating = request('rating');
        $restaurant->street = request('street');
        $restaurant->city = request('city');
        $restaurant->state = request('state');
        $restaurant->lat = request('lat');
        $restaurant->lng = request('lng');

        $restaurant->save();

        return redirect('/restaurants'); 
    }


    public function destroy($id){
        Restaurant::findorFail($id)->delete();
        return redirect('/restaurants');
    }

    public function add(){

        Restaurant::create(request()->all());
    	

    	return redirect('/restaurants');
    }

    public function loadFromCsv( Request $request) {

        //dd($request->file('file'));
        /*
          "id" => "851f799f-0852-439e-b9b2-df92c43e7672"
          "rating" => "1"
          "name" => "Barajas, Bahena and Kano"
          "site" => "https://federico.com"
          "email" => "Anita_Mata71@hotmail.com"
          "phone" => "534 814 204"
          "street" => "82247 Mariano Entrada"
          "city" => "Mérida Alfredotown"
          "state" => "Durango"
          "lat" => "19.4400570537131"
          "lng" => "-99.1270470974249"*/
        
        $csv = Reader::createFromPath($request->file('file'), 'r');
        $csv->setHeaderOffset(0); //set the CSV header offset

        $stmt = (new Statement());

        $records = $stmt->process($csv);
        foreach ($records as $record) {
             Restaurant::create($record);
        }


        return redirect('/restaurants');
    }

    public function distanceBtwTwoPoints($lat1,$lng1,$lat2,$lng2){
        if (($lat1 == $lat2) && ($lng1 == $lng2)) {
            return 0;
        }
        else {
            $radiusOfEarth = 6371000;// Earth's radius in meters.
            $diffLatitude = $lat2 - $lat1;
            $diffLongitude = $lng2 - $lng1;
            $a = sin($diffLatitude / 2) * sin($diffLatitude / 2) +
                cos($lat1) * cos($lat2) *
                sin($diffLongitude / 2) * sin($diffLongitude / 2);
            $c = 2 * asin(sqrt($a));
            $distance = $radiusOfEarth * $c;

            return $distance;

        }

    }
    function stats_standard_deviation(array $array, $sample = false) {
        $coutArray = count($array);
        if ($coutArray === 0) {
            trigger_error("The array has zero elements", E_USER_WARNING);
            return false;
        }
        if ($sample && $coutArray === 1) {
            trigger_error("The array has only 1 element", E_USER_WARNING);
            return false;
        }
        $mean = array_sum($array) / $coutArray;
        $carry = 0.0;
        foreach ($array as $val) {
            $d = ((double) $val) - $mean;
            $carry += $d * $d;
        };
        if ($sample) {
           --$coutArray;
        }
        return sqrt($carry / $coutArray);
    }
}
