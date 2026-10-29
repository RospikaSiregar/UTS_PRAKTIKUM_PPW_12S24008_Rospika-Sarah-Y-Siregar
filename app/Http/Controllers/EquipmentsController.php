<?php

namespace App\Http\Controllers;

use App\Models\equipments;
use Illuminate\Http\Request;
use App\Models\categories;

class EquipmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Equipment::with('category');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('asset_code', 'like', "%{$search}%");
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $equipments = $query->paginate(5)->appends($request->query());
        $categories = Category::all();

        return view('equipments.index', compact('equipments', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('equipments.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'asset_code' => 'required|unique:equipments,asset_code',
            'name' => 'required|min:5|max:150',
            'category_id' => 'required|exists:categories,id',
            'specification' => 'required',
            'condition' => 'required|in:baik,rusak_ringan,rusak_berat',
            'daily_rental_fee' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpeg,png,webp|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $fileName = time() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('equipments', $fileName, 'public');
            $validated['image_path'] = $path;
        }

        $validated['status'] = 'tersedia';

        $equipment = Equipment::create($validated);

        return redirect()->route('equipments.index')
            ->with('success', "[SUKSES] Perangkat '{$equipment->name}' (Kode: {$equipment->asset_code}) berhasil didaftarkan!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $equipment = Equipment::with('category')->findOrFail($id);
        return view('equipments.show', compact('equipment'));
    }

}   