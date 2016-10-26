<?php

namespace Cashflow\SinoPac;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SinoPacController extends Controller
{
    //
    public function index($timezone){
        $current_time = ($timezone)
          ? Carbon::now(str_replace('-', '/', $timezone))
          : Carbon::now();
        return view('sinopac::time', compact('current_time'));
    }

    public function payNotify(Request $requests){
        \Log::info("Pay Notify");
        \Log::info(\GuzzleHttp\json_encode($requests->all()));
        return 'done';
    }

    public function authSuccess(Request $requests){
        \Log::info("Credit Auth Success");
        \Log::info(\GuzzleHttp\json_encode($requests->all()));
        return 'done';
    }

    public function authFail(Request $requests){
        \Log::info("Credit Auth Fail");
        \Log::info(\GuzzleHttp\json_encode($requests->all()));
        return 'done';
    }

    public function report(){
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1>');
        return $pdf->stream();
    }
}
