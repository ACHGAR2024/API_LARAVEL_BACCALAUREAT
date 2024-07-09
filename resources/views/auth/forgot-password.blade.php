<x-guest-layout>
    <div class="mb-4 text-sm text-white dark:text-gray-400">
        {{ __('Mot de passe oublié ? Pas de souci. Simplement indiquez votre adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de passe qui vous permettra de choisir un nouveau mot de passe.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label class="text-white" for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <div>
                <button
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    {{ __('Envoyer le lien de réinitialisation du mot de passe') }}
                </button>
            </div>
        </div>
    </form>
</x-guest-layout>
