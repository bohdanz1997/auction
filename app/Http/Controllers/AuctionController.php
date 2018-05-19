<?php

namespace App\Http\Controllers;

use App\Auction;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    public function index()
    {
        return Auction::with('lot', 'bets')->get();
    }

    public function store()
    {
        $this->validate(request(), [
            'start_datetime' => 'required',
            'end_plan_datetime' => 'required',
            'start_price' => 'required',
            'step' => 'required',
            'message' => 'required',
            'lot_id' => 'required',
        ]);

        $auctionData = request()->all();

        $auctionData['max_price'] = $auctionData['start_price'];

        $auction = Auction::create($auctionData);
        $auction->load('lot.pictures', 'bets');

        return $auction;
    }

    public function update(Auction $auction)
    {
        $this->validate(request(), [
            'start_datetime' => 'required',
            'end_plan_datetime' => 'required',
            'start_price' => 'required',
            'step' => 'required',
            'message' => 'required',
            'lot_id' => 'required',
        ]);

        $auctionData = request()->all();

        $auction->update($auctionData);
        $auction->load('lot.pictures', 'bets');

        return $auction;
    }

    public function destroy(Auction $auction)
    {

        return tap($auction)->delete();
    }
}
