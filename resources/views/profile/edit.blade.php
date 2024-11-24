
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight bg-indigo-700 py-4 px-6 shadow-md rounded-md">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Update Profile Information -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-700 mb-4">{{ __('Update Profile Information') }}</h3>
                <div class="border-t border-gray-200 pt-4">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <!-- Update Password -->
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-lg font-bold text-gray-700 mb-4">{{ __('Update Password') }}</h3>
                <div class="border-t border-gray-200 pt-4">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <!-- Delete Account -->
            <div class="bg-red-50 shadow rounded-lg p-6 border border-red-300">
                <h3 class="text-lg font-bold text-red-700 mb-4">{{ __('Delete Account') }}</h3>
                <p class="text-sm text-red-600 mb-4">
                    {{ __('Once you delete your account, there is no going back. Please be certain.') }}
                </p>
                <div class="border-t border-red-200 pt-4">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
