<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Services\Rajaongkir\RajaongkirService;
use Illuminate\Http\Request;

class RajaongkirController extends Controller
{
    protected $rajaongkirService;

    public function __construct(RajaongkirService $rajaongkirService)
    {
        $this->rajaongkirService = $rajaongkirService;
    }

    public function getCity($province_id)
    {
        return $this->rajaongkirService->getCity($province_id);
    }

    public function cost(Request $request)
    {
        return $this->rajaongkirService->cost($request->origin,$request->destination,$request->weight,$request->courier);
    }
}
