<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndexRequest;
use App\Services\HotelService;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct(
        private HotelService $hotelService,
    )
    {}

    public function index(IndexRequest $request)
    {
        $result = $this->hotelService->check($request->input('hotel_id'));

        return view('welcome', compact('result'));
    }
}
