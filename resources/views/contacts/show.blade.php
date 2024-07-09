@extends('layouts.app')

@section('content')

    <!-- Messages de Contact Partie Admin-->

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-white bg-blue-900 p-4 rounded">Messages de Contact</h1>


        <div id="responseMessage">
            @if (session('success'))
                <div class="bg-green-500 text-white font-bold py-2 px-4 rounded">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-500 text-white font-bold py-2 px-4 rounded">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <div class="overflow-x-auto mt-3">
            @if ($contacts->isEmpty())
                <p class="text-gray-700">Aucun message de contact trouvé.</p>
            @else
                @if ($currentUser->role_id == 2)
                    <table class="table-auto w-full">
                        <thead class="bg-gray-700 text-white">
                            <tr>
                                <th class="px-4 py-2">Nom</th>
                                <th class="px-4 py-2">Email</th>
                                <th class="px-4 py-2">Message</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $contact)
                                <tr class="{{ $loop->even ? 'bg-gray-400' : 'bg-gray-300' }}">
                                    <td class="border px-4 py-2">{{ $contact->nom_contact }}</td>
                                    <td class="border px-4 py-2">{{ $contact->email_contact }}</td>
                                    <td class="border px-4 py-2">{{ $contact->message_contact }}</td>
                                    <td class="border px-4 py-2">
                                        <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST"
                                            onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                                Supprimer
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            @endif
        </div>
    </div>
@endsection
