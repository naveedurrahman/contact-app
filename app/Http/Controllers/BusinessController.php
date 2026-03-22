<?php

namespace App\Http\Controllers;

use App\Http\Requests\BusinessRequest;
use App\Models\Business;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $businesses = Business::with('categories', 'tags')->withCount('people')->latest()->paginate(10);
        return view('business.index', compact('businesses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('business.create', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BusinessRequest $request)
    {
        $business = Business::create($request->validated());
        if ($request->has('tags')) {
            $business->tags()->sync($request->tags);
        }
        if ($request->has('categories')) {
            $business->categories()->sync($request->categories);
        }
        return redirect(route('business.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Business $business)
    {
        return view('business.detail', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Business $business)
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('business.edit', compact('business', 'tags', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BusinessRequest $request, Business $business)
    {
        $business->update($request->validated());
        if ($request->has('tags')) {
            $business->tags()->sync($request->tags);
        }
        if ($request->has('categories')) {
            $business->categories()->sync($request->categories);
        }
        return redirect(route('business.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Business $business)
    {
        $business->delete();
        return redirect()->back();
    }
}
