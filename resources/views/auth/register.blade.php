<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
        @csrf

        <!-- Pseudo -->
        <div>
            <x-input-label class="text-white" for="pseudo" :value="__('Pseudo')" />
            <x-text-input class="text-black" id="pseudo" class="block mt-1 w-full" type="text" name="pseudo"
                :value="old('pseudo')" required autofocus autocomplete="pseudo" />
            <x-input-error :messages="$errors->get('pseudo')" class="mt-2 text-black" />
        </div>

        <!-- Image URL -->
        <div class="mt-4">
            <x-input-label class="text-white" for="image" :value="__('Image Avatar')" />
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" required
                autocomplete="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label class="text-white" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label class="text-white" for="password" :value="__('Mot de passe')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label class="text-white" for="password_confirmation" :value="__('Confirmation mot de passe')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-white dark:text-gray-400 hover:text-green-500 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Déjà un compte?') }}
            </a>

            <div class="ms-4">
                <button
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __("S'inscrire") }}
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>
