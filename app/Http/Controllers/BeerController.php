<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use GuzzleHttp\Client;

class BeerController extends Controller
{
    public function index()
    {
        $params = [
            'page' => request('page', 1),
            'per_page' => request('per_page', 80),
        ];

        return $this->api_request($params);
    }

    public function api_request($params)
    {
        $response = Http::get('https://api.punkapi.com/v2/beers', $params);
        return json_decode($response->getBody(), true);
    }

    public function loadbear()
    {
        $perPage = 10;

        $Api_Per_page=80;

        $page = request('page', 1);

        $api_page=intval(($perPage * ($page -1) )/$Api_Per_page) ;

        $beers = $this->api_request(['page' => $api_page +1, 'per_page' => $Api_Per_page]);

        $nextBeers = $this->api_request(['page' => $api_page +2, 'per_page' => $Api_Per_page]);

        $totalCount = $api_page*$Api_Per_page+count($beers)+count($nextBeers);

        $currentItems = array_slice($beers, $perPage * ($page -(($Api_Per_page/$perPage)*$api_page)  - 1), $perPage);

        $paginator = new LengthAwarePaginator($currentItems, $totalCount, $perPage, $page, ['path' => url()->current()]);

        return view('beers', ['response' => $paginator]);
    }
}
