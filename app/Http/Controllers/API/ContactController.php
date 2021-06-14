<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactCollection;
use App\Http\Resources\ContactResource;
use App\Models\Contact;
use App\Models\Film;
use App\Models\Job;
use Illuminate\Http\Request;

class ContactController extends Controller
{
   
    public function fullName()
    {
        return Contact::all()->map(function (Contact $contact) {
            return [
                'id' => $contact->id,
                'text' => $contact->getFullName(),
            ];
        });
    }

}
