<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Computers;
use App\Models\Issues;

class IssuesController extends Controller
{
    public function index()
    {
        $issues = Issues::with('computers')->paginate(5); 
        return view('home.index', compact('issues'));
    }    

    public function create()
    {
        $computers = Computers::all(); 
        return view('home.create', compact('computers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|max:255',
            'reported_date' => 'required|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        Issues::create($request->all());

        return redirect()->route('home.index')->with('success', 'Vấn đề đã được thêm thành công!');
    }

    public function edit($id)
    {
        $issues = Issues::findOrFail($id);
        $computers = Computers::all();
        return view('home.edit', compact('issues', 'computers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'nullable|max:255',
            'reported_date' => 'nullable|date',
            'description' => 'required',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved',
        ]);

        $issues = Issues::findOrFail($id);
        $issues->update($request->all());

        return redirect()->route('home.index')
            ->with('success', 'Vấn đề có mã: ' . $issues->id .  ' đã được cập nhật thành công!');
    }

    public function destroy($id)
    {
        $issues = Issues::findOrFail($id);
        $issues->delete();

        return redirect()->route('home.index')->with('success', 'Vấn đề có mã: ' . $issues->id .  ' đã được xóa thành công!');
    }
}
