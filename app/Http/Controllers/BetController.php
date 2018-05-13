<?php

namespace App\Http\Controllers;

use App\Auction;
use App\Bet;
use Illuminate\Http\Request;

class BetController extends Controller
{
    public function index()
    {
        return Bet::with('user')->get();
    }

    public function store()
    {
        $userId = auth()->user()->id;

        $betData = request()->all();
        $betData['user_id'] = $userId;

        $bet = Bet::create($betData);
        $bet->load('user');

        $auction = Auction::find($bet->auction_id);

        $auction->max_price = $bet->price;
        $auction->save();
        $auction->load('bets');

        return compact('bet', 'auction');
    }

    public function update(Bet $bet)
    {
        $betData = request()->all();

        $bet->fill($betData);

        return $bet;
    }

    public function destroy(Bet $bet)
    {
        return $bet->delete();
    }
}
