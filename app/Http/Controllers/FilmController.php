<?php

namespace App\Http\Controllers;

use App\Http\Requests\FilmRequest;
use App\Models\Film;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        //Get all the films with their number of contacts
        $films = Film::withCount(['contacts'])->get();

        return view('films.filmsIndex', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('films.filmsCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FilmRequest $request
     * @return RedirectResponse
     */
    public function store(FilmRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $film = Film::create([
            'title' => $validatedData['title'],
            'year' => $validatedData['year'],
        ]);

        //If the request contains contacts related to a job for the film
        if (!empty($validatedData['contacts'])) {
            foreach ($validatedData['contacts'] as $jobID => $contacts) {
                $film->contacts()->attach($contacts, ['job_id' => $jobID]);
            }

            smilify('success', 'Film successfully created with your contact(s) !');
        } else {
            smilify('success', 'Film successfully created !');
        }

        return redirect()->route('films.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Film $film
     * @return View
     */
    public function edit(Film $film): View
    {
        return view('films.filmsUpdate', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FilmRequest $request
     * @param Film $film
     * @return RedirectResponse
     */
    public function update(FilmRequest $request, Film $film): RedirectResponse
    {
        $validatedData = $request->validated();

        $film->update([
            'title' => $validatedData['title'],
            'year' => $validatedData['year'],
        ]);

        $film->save();

        if (!empty($validatedData['contacts'])) {
            //Detach all the old contacts
            $film->contacts()->sync([]);

            //Attach the new contacts
            foreach ($validatedData['contacts'] as $jobID => $contacts) {
                $film->contacts()->attach($contacts, ['job_id' => $jobID]);
            }
        }

        smilify('success', __('Film successfully modified !'));

        return redirect()->route('films.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Film $film
     * @return RedirectResponse
     */
    public function destroy(Film $film): RedirectResponse
    {
        $film->delete();

        smilify('success', 'Film successfully deleted !');

        return redirect()->back();
    }
}
