<?php

namespace App\Http\Controllers\Tip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
            'code' => 'required|string',
        ]);

        auth()->user()->tips()->create([
            'content' => $request->content,
            'code' => $request->code,
        ]);

        return redirect()->back()->with('status', 'tip-created');
    }
}
