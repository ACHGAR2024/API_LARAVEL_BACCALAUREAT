<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactsController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $validator = Validator::make($request->all(), [
            'nom_contact' => 'required|string|max:100',
            'email_contact' => 'required|email|max:100',
            'message_contact' => 'required|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Création du contact
        $contact = new Contact();
        $contact->nom_contact = $request->nom_contact;
        $contact->email_contact = $request->email_contact;
        $contact->message_contact = $request->message_contact;
        $contact->save();

        return redirect()->route('contacts.index')->with('success', 'Votre message a bien été envoyé avec succès!');
    }


    public function index()
    {


        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }
    public function show()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        $currentUser = Auth::user();
        return view('contacts.show', compact('contacts', 'currentUser'));

    }
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('contacts.show')->with('success', 'Message supprimé avec succès.');
    }



}