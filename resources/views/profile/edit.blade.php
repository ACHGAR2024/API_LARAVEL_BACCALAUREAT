@extends('layouts.app')

@section('content')
    <!-- Update Profile Information Form -->


    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-gray-400 dark:bg-sky-950 shadow sm:rounded-lg">
                <div class="max-w-xl">



                    <div>
                        <image class="w-24 h-24 rounded-full" src="{{ asset('storage/' . $user->image) }}"></image>
                    </div>
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Informations du profil') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __("Mettez à jour les informations de profil de votre compte et l'adresse email.") }}
                            </p>
                        </header>

                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>



                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6"
                            enctype="multipart/form-data">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="pseudo" :value="__('Pseudo')" />
                                <x-text-input id="pseudo" name="pseudo" type="text" class="mt-1 block w-full"
                                    :value="old('pseudo', $user->pseudo)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('pseudo')" />
                            </div>

                            <div>
                                <x-input-label for="image" :value="__('Image Avatar')" />
                                <x-text-input id="image" name="image" type="file" class="mt-1 block w-full"
                                    accept="image/jpeg,image/png" :value="old('image', $user->image)" />
                                <x-input-error class="mt-2" :messages="$errors->get('image')" />
                                <span class="text-sm text-gray-500 dark:text-gray-400">Ajoutez une image (JPG ou PNG, 1 Mo
                                    max)</span>
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                                    :value="old('email', $user->email)" required autocomplete="username" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>
                            <div class="text-center">
                                <div class="flex items-center gap-4 ">
                                    <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>

                                    @if (session('status') === 'profile-updated')
                                        <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400">{{ __(' Sauvegardé.') }}</p>
                                    @endif
                                </div>
                            </div>
                        </form>

                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-gray-400 dark:bg-sky-950 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- Update Password Form -->
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Mise à jour du mot de passe ') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')

                            <div>
                                <x-input-label for="current_password" :value="__('Mot de passe actuel')" />
                                <x-text-input id="current_password" name="current_password" type="password"
                                    class="mt-1 block w-full" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password" :value="__('Nouveau mot de passe')" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                    autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                            </div>

                            <div>
                                <x-input-label for="password_confirmation" :value="__('Confirmation de mot de passe')" />
                                <x-text-input id="password_confirmation" name="password_confirmation" type="password"
                                    class="mt-1 block w-full" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Sauvegarder') }}</x-primary-button>

                                @if (session('status') === 'password-updated')
                                    <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600 dark:text-gray-400">{{ __(' Sauvegardé.') }}</p>
                                @endif
                            </div>
                        </form>
                    </section>
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-gray-400 dark:bg-sky-950 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <!-- Delete User Form -->
                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Supprimer le compte') }}
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.') }}
                            </p>
                        </header>

                        <form method="post" action="{{ route('profile.destroy') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('delete')

                            <div>
                                <x-input-label for="password" :value="__('Mot de passe')" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                                    autocomplete="current-password" />
                                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                            </div>

                            <div class="flex justify-end">
                                <x-danger-button>
                                    {{ __('Supprimer le compte') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection
