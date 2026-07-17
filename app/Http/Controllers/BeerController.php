<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brewery;
use Inertia\Inertia;

class BeerController extends Controller
{
    function index(request $request)
    {
        $id = $request->route('id');

        $brewery = Brewery::where('id', $id)->firstOrFail();

        $beers = $brewery->beers()->paginate(4);

        return Inertia::render('Beers', [
            'brewery' => $brewery,
            'beers' => $beers,
        ]);

    }
}
