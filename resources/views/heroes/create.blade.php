@extends('layouts.app')

@section('content')

    <!-- Creer un heros -->

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-white bg-blue-900 p-4 rounded">Créer un héros</h1>

        @if ($errors->any())
            <div class="bg-red-900 text-white px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('heroes.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md ml-14">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-bold mb-2 text-white">Nom</label>
                <input type="text" name="name" id="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="mb-4">
                <label for="gender" class="block text-sm font-bold mb-2 text-white">Genre</label>
                <input type="text" name="gender" id="gender"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="mb-4">
                <label for="race" class="block text-sm font-bold mb-2 text-white">Race</label>
                <input type="text" name="race" id="race"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-sm font-bold mb-2 text-white">Description</label>
                <textarea name="description" id="description"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required></textarea>
            </div>
            <div class="mb-4">
                <label for="skill_id" class="block text-sm font-bold mb-2 text-white">Compétence</label>
                <select name="skill_id" id="skill_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    @foreach ($skills as $skill)
                        <option value="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="universe_id" class="block text-sm font-bold mb-2 text-white">Univers</label>
                <select name="universe_id" id="universe_id"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                    @foreach ($universes as $universe)
                        <option value="{{ $universe->id }}">{{ $universe->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <label for="photo" class="block text-sm font-bold mb-2 text-white">Photo</label>
                <input type="file" name="photo" id="photo"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="text-right">
                <button type="submit"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Créer</button>
            </div>
        </form>
    </div>
@endsection
