<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $contacts = Contact::all();

        return view('contacts.contactsIndex', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ContactRequest $request
     * @return RedirectResponse
     */
    public function store(ContactRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();
        Contact::create($validatedData);

        smilify('success', __('Contact successfully created'));

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Contact $contact
     * @return View
     */
    public function edit(Contact $contact): View
    {
        return view('contacts.contactsEdit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ContactRequest $request
     * @param Contact $contact
     * @return RedirectResponse
     */
    public function update(ContactRequest $request, Contact $contact): RedirectResponse
    {
        $validatedData = $request->validated();

        $contact->update($validatedData);
        $contact->save();

        smilify('success', 'Contact successfully modified !');

        return redirect()->route('contacts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return Response
     */
    public function destroy(Contact $contact): RedirectResponse
    {
        $contact->delete();

        smilify('success', 'Contact successfully deleted !');

        return redirect()->back();
    }
}
