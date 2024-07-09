@extends('layouts.app')

@section('content')

    <!-- Liste des competences -->

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-white bg-blue-900 p-4 rounded">Compétences des héros</h1>
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="mb-4 text-right">
            <a href="{{ route('skills.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Ajouter une nouvelle
                compétence</a>
        </div>
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mt-3">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto w-full mt-3">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Nom</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($skills as $skill)
                    <tr class="{{ $loop->even ? 'bg-gray-500 text-white' : 'bg-gray-700 text-white' }}">
                        <td class="border px-4 py-2">{{ $skill->id }}</td>
                        <td class="border px-4 py-2">{{ $skill->name }}</td>
                        <td class="border px-4 py-2 text-center">
                            <a href="{{ route('skills.edit', $skill->id) }}"
                                class=" bg-yellow-400 hover:bg-yellow-700 text-gray-700 hover:text-white font-bold py-1 px-2 rounded">Modifier</a>
                            <form action="{{ route('skills.destroy', $skill->id) }}" method="POST"
                                class="inline-block mt-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="ml-4 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
