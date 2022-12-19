<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SensorWarna;

class HomeController extends Controller {

    public function index() {
        $data = DB::table( 'sensor_warna' )->orderBy( 'created_at', 'desc' )->limit( 1 )->get();

        return view( 'home', compact( 'data' ) );
    }

    public function store( Request $req ) {
        $sensor = new SensorWarna;

        $sensor->r = $req->r;
        $sensor->g = $req->g;
        $sensor->b = $req->b;

        $sensor->save();
    }

}