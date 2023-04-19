<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function create()
    {
        return view('pages.backend.map.create');
    }

    public function store(Request $request)
    {
        $lat = $request->input('latitude');
        $lng = $request->input('longitude');
        $zoom = $request->input('zoom');


        $url = "https://maps.googleapis.com/maps/api/staticmap?center={$lat},{$lng}&zoom={$zoom}&size=400x400&markers=color:red%7Clabel:A%7C{$lat},{$lng}&key=AIzaSyCMpGsuYhVWPTrdF8UI5kMk7GPc3Zk86V8";
        // https://maps.googleapis.com/maps/api/staticmap?center={$lat},{$lng}&zoom={$zoom}&size=400x400&markers=color:red%7Clabel:A%7C{$lat},{$lng}&key=AIzaSyCMpGsuYhVWPTrdF8UI5kMk7GPc3Zk86V8
        $imageData = file_get_contents($url);
        // $path = public_path('assets/backend/maps/'. uniqid(). '.png');
        $imagePath = 'maps/' . uniqid() . '.png';
        file_put_contents(public_path($imagePath), $imageData);

        return redirect($imagePath);
    }
}
