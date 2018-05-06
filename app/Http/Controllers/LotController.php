<?php

namespace App\Http\Controllers;

use App\Lot;
use App\Picture;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LotController extends Controller
{
    public function index()
    {
        return Lot::with('breed', 'user', 'gender', 'cert', 'auctions')->get();
    }

    public function store()
    {
        $userId = auth()->user()->id;

        $this->validate(request(), [
            'name' => 'required',
            'birth_date' => 'required',
            'breed_id' => 'required',
            'gender_id' => 'required',
            'cert_id' => 'required',
            'short_description' => 'required',
            'main_picture' => 'required|image',
        ]);

        $lotData = request()->all();
        $lotData['user_id'] = $userId;
        $path = request('main_picture')->store('public/pictures');
        $lotData['main_picture'] = str_replace('public', 'storage', $path);

        $lotModel = Lot::create($lotData);

        $picturePaths = array_map(function ($picture) use ($lotModel) {
            $path = $picture->store('public/pictures');
            return [
                'path' => str_replace('public', 'storage', $path),
                'lot_id' => $lotModel->id,
            ];
        }, request('pictures', []));

        $lotModel->pictures()->createMany($picturePaths);

        return $lotModel;
    }

    public function update(Request $request, Lot $lot)
    {
        //
    }

    public function destroy(Lot $lot)
    {
        return tap($lot)->delete();
    }
}
