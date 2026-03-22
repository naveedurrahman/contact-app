<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Business;
use App\Models\Person;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::with('business', 'tags')->latest()->paginate(10);
        return view('person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $businesses = Business::all();
        $tags = Tag::all();
        return view('person.create', compact('businesses', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        $person = Person::create($request->validated());
        if ($request->has('tags')) {
            $person->tags()->sync($request->tags);
        }
        return redirect(route('person.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        return view('person.detail', compact('person'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        $businesses = Business::all();
        $tags = Tag::all();
        return view('person.edit', compact('person', 'businesses', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Person $person)
    {
        $person->update($request->validated());
        if ($request->has('tags')) {
            $person->tags()->sync($request->tags);
        }
        return redirect(route('person.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return redirect()->back();
    }
}
