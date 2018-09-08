<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Parties;


class PartieControllerApi extends Controller
{
    public function index()
    {
        $parties = Parties::where('deleted', false)->get();
        return response()->json(
            $parties
        );
    }
}
