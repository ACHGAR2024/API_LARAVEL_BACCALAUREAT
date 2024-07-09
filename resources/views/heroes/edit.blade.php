@extends('layouts.app')

@section('content')

    <!-- Modifier le héros -->

    <div class="text-left m-4 ml-8"> <a href="{{ route('heroes.index') }}"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Retour</a>
    </div>

    <div class="container mx-auto px-4 py-3">
        <h1 class="text-3xl font-bold mb-4 text-white bg-blue-900 p-4 rounded">Modifier le héros</h1>
    </div>
    <div class="container mx-auto px-4 ">

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700  rounded ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('heroes.update', $hero->id) }}" method="POST" enctype="multipart/form-data"
            class="max-w-md ml-12">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="name" class="block text-gray-200 text-sm font-bold mb-2 ">Nom</label>
                <input type="text" name="name" id="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ $hero->name }}" required>
            </div>
            <div class="mb-4">
                <label for="gender" class="block text-gray-200 text-sm font-bold mb-2">Genre</label>
                <input type="text" name="gender" id="gender"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ $hero->gender }}" required>
            </div>
            <div class="mb-4">
                <label for="race" class="block text-gray-200 text-sm font-bold mb-2">Race</label>
                <input type="text" name="race" id="race"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    value="{{ $hero->race }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-200 text-sm font-bold mb-2">Description</label>
                <textarea name="description" id="description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>{{ $hero->description }}</textarea>
            </div>
            <div class="mb-4">
                <label for="skill_id" class="block text-gray-200 text-sm font-bold mb-2">Compétence</label>
                <select name="skill_id" id="skill_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->id }}" {{ $hero->skill_id == $skill->id ? 'selected' : '' }}>
                            {{ $skill->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="universe_id" class="block text-gray-200 text-sm font-bold mb-2">Univers</label>
                <select name="universe_id" id="universe_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    @foreach ($universes as $universe)
                        <option value="{{ $universe->id }}" {{ $hero->universe_id == $universe->id ? 'selected' : '' }}>
                            {{ $universe->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="p-4">
                <label for="photo" class="block text-gray-200 text-sm font-bold mb-2">Photo</label>
                <input type="file" name="photo" id="photo"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <div class="text-right mt-4"> <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold  py-2 px-4 rounded focus:outline-none focus:shadow-outline">Mettre
                        à jour</button>

                </div>
                @if ($hero->photo)
                    <img src="{{ $hero->photo_url }}" alt="{{ $hero->name }}" class="-mt-12  w-32 h-32 object-cover">
                @endif
            </div>
        </form>
        <div></div>
    </div>
@endsection
