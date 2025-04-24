<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Idea;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $ideas = Idea::orderBy('created_at', 'DESC');

        if (request('search')) {
            $ideas =  $ideas->where('content', 'like', '%' . request('search') . '%');
        }
        return view('dashboard', [
            'ideas' => $ideas->paginate(3),
        ]);
    }
}
