<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

function currentRoute(){
    Log::info(request()->route()->getName());
    return request()->route()->getName();
}

function getDateTime($dateTime, $format){
    return Carbon::parse($dateTime)->format($format);
}


