@extends('layouts.app')

@section('content')

    <!-- Table des heroes -->

    <div class="container mx-auto px-4 py-8 ">
        <h1 class="text-3xl font-bold mb-4 text-white bg-blue-900 p-4 rounded">Liste des héros</h1>
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
            <a href="{{ route('heroes.create') }}"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4">Créer un héro</a>
        </div>
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2">Nom</th>
                        <th class="px-4 py-2">Gender</th>
                        <th class="px-4 py-2">Race</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Compétence</th>
                        <th class="px-4 py-2">Univers</th>
                        <th class="px-4 py-2">Photo</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($heroes as $hero)
                        <tr class="{{ $loop->even ? 'bg-gray-500 text-white' : 'bg-gray-700 text-white' }}">
                            <td class="border px-4 py-2">{{ $hero->name }}</td>
                            <td class="border px-4 py-2">{{ $hero->gender }}</td>
                            <td class="border px-4 py-2">{{ $hero->race }}</td>
                            <td class="border px-4 py-2">{{ $hero->description }}</td>
                            <td class="border px-4 py-2">{{ $hero->skill->name }}</td>
                            <td class="border px-4 py-2">{{ $hero->universe->name ?? 'N/A' }}</td>
                            <td class="border px-4 py-2">
                                @if ($hero->photo_url)
                                    <img src="{{ $hero->photo_url }}" alt="{{ $hero->name }}"
                                        class="w-32 h-32 object-cover">
                                @else
                                    <span>No photo</span>
                                @endif
                            </td>
                            <td class="border px-4 py-2">
                                <a href="{{ route('heroes.edit', $hero->id) }}"
                                    class=" bg-yellow-400 hover:bg-yellow-700 text-gray-700 hover:text-white font-bold py-1 px-2 rounded">Modifier</a>
                                <form action="{{ route('heroes.destroy', $hero->id) }}" method="POST"
                                    class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="mt-3 bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
