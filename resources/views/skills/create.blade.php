@extends('layouts.app')

@section('content')

    <!-- Ajouter une nouvelle competence -->

    <div class="text-left m-4 ml-8"> <a href="{{ route('skills.index') }}"
            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Retour</a>
    </div>

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold mb-4 text-white bg-blue-900 p-4 rounded">Ajouter une nouvelle compétence héros</h1>

        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('skills.store') }}" method="POST" class="max-w-md">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-white text-sm font-bold mb-2 ">Nom de la compétence héros </label>
                <input type="text" name="name" id="name"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
            </div>
            <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ajouter</button>
        </form>
    </div>
@endsection
