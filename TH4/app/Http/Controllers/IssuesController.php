<?php

namespace App\Http\Controllers;

use App\Models\Computers;
use App\Models\issues;
use Illuminate\Http\Request;

class ComputerController extends Controller
{
    public function index()
    {
        $issues = Issues::with('computers')->paginate(5); 
        return view('home.index', compact('issues'));  
    }

    public function create()
    {
        $computer = Computers::all(); 
        return view('.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titlecomputer_id' => 'required',
            'reported_by' => 'required|max:255',
            'reported_date' => 'required|date',
            'description' => 'required|max:100',
            'urgency' => 'required|max:255',
            'status' => 'required',
        ]);

        Issues::create($request->all());

        return redirect()->route('home.index')->with('success', 'Đồ án đã được thêm thành công!');
    }
}
