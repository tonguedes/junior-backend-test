<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */  public function index() {
        return Inertia::render('Contacts/Index', [
            'contacts' => Contact::all()
        ]);
    }

    public function create() {
        return Inertia::render('Contacts/Create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts',
            'phone' => 'nullable'
        ]);
        Contact::create($data);
        return redirect()->route('contacts.index');
    }

    public function edit(Contact $contact) {
        return Inertia::render('Contacts/Edit', ['contact' => $contact]);
    }

    public function update(Request $request, Contact $contact) {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:contacts,email,' . $contact->id,
            'phone' => 'nullable'
        ]);
        $contact->update($data);
        return redirect()->route('contacts.index');
    }

    public function destroy(Contact $contact) {
        $contact->delete();
        return redirect()->route('contacts.index');
    }
}

