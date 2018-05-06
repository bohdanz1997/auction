<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index()
    {
        return Auction::with('lot')->get();
    }

    public function store()
    {
        $this->validate(request(), [
            'start_datetime' => 'required',
            'end_plan_datetime' => 'required',
            'end_datetime' => 'required',
            'start_price' => 'required',
            'max_price' => 'required',
            'step' => 'required',
            'message' => 'required',
            'lot_id' => 'required',
        ]);

        $auctionData = request()->all();

        $auction = Auction::create($auctionData);
        $auction->load('lot');

        return $auction;
    }

    public function update(Request $request, Auction $auction)
    {
        //
    }

    public function destroy(Auction $auction)
    {
        return tap($auction)->delete();
    }
}
