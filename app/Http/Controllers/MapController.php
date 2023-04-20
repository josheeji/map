<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MapController extends Controller
{
    public function create()
    {
        $maps = Map::all();
        return view('pages.backend.map.create', compact('maps'));
    }

    public function store(Request $request)
    {
        // $input = $request->only(
        //     'latitude',
        //     'longitude',
        //     'image',
        //     'zoom',
        //     'height',
        //     'width'
        // );
        



        $lat = $request->input('latitude');
        $lng = $request->input('longitude');
        $zoom = $request->input('zoom');
        $height = $request->input('height');
        $width = $request->input('width');


        $image = "https://maps.googleapis.com/maps/api/staticmap?center={$lat},{$lng}&zoom={$zoom}&size={$height}x{$width}&markers=color:red%7Clabel:A%7C{$lat},{$lng}&key=AIzaSyCMpGsuYhVWPTrdF8UI5kMk7GPc3Zk86V8";
        $imageData = file_get_contents($image);
        $imagePath = 'maps/' . uniqid() . '.png';
        file_put_contents(public_path($imagePath), $imageData);


        $map = new Map();
        $map->latitude = $lat;
        $map->longitude = $lng;
        $map->zoom = $zoom;
        $map->image = $imagePath;
        $map->height = $height;
        $map->width = $width;

        $map->save();

        return redirect('admin/maps');
    }
}
