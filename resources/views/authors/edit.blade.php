<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Modify this author') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('authors.update', $author) }}">

            @csrf
            @method('patch')

            <!-- Fullname -->
            <div>
                <x-input-label for="fullname" :value="__('Fullname')" />
                <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname', $author->fullname)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
            </div>

            <!-- Nationality -->
            <div>
                <x-input-label for="nationality" :value="__('Nationality')" />
                <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality" :value="old('nationality', $author->nationality)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
            </div>

            <!-- Description -->
            <div>
                <x-input-label for="fullname" :value="__('Description')" />
                <textarea
                    name="description"
                    placeholder="{{ __('Describe something about him .') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('description', $author->description) }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="mt-4 space-x-2">
                <x-primary-button>{{ __('Edit') }}</x-primary-button>
                <a href="{{ route('authors.index') }}">{{ __('Cancel') }}</a>
            </div>
        </form>
    </div>
</x-app-layout>
