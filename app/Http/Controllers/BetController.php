<?php

namespace App\Http\Controllers;

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

        return Bet::create($betData);
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
