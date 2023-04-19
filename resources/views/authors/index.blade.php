<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Authors list') }}
            <small>
                [ {{ count($authors) }} {{ __('author(s) in the database') }}. ]
            </small>
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        <form method="POST" action="{{ route('authors.store') }}">
            @csrf

            <!-- Fullname -->
            <div>
                <x-input-label for="fullname" :value="__('Fullname')" />
                <x-text-input id="fullname" class="block mt-1 w-full" type="text" name="fullname" :value="old('fullname')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('fullname')" class="mt-2" />
            </div>

            <!-- Nationality -->
            <div>
                <x-input-label for="nationality" :value="__('Nationality')" />
                <x-text-input id="nationality" class="block mt-1 w-full" type="text" name="nationality" :value="old('nationality')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
            </div>

            <!-- Description -->
            <div>
                <x-input-label for="fullname" :value="__('Description')" />
                <textarea
                    name="description"
                    placeholder="{{ __('Describe something about him .') }}"
                    class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                >{{ old('description') }}</textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                <x-primary-button class="mt-4">{{ __('Save') }}</x-primary-button>
            </div>
        </form>
    </div>

    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8 bg-white">
        @foreach ($authors as $author)
            <div class="p-6 flex space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                </svg>
                <div class="flex-1">
                    <div class="flex justify-between items-center">
                        <div>
                            <span class="text-gray-800">{{ $author->fullname }}</span>
                            <small class="ml-2 text-sm text-gray-600">{{ $author->nationality }}</small>
                            @unless ($author->created_at->eq($author->updated_at))
                                <small class="text-sm text-gray-600"> &middot; {{ __('edited') }}</small>
                            @endunless
                        </div>
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('authors.edit', $author)">
                                    {{ __('Edit') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('authors.destroy', $author) }}">
                                    @csrf
                                    @method('delete')
                                    <x-dropdown-link :href="route('authors.destroy', $author)" onclick="event.preventDefault(); this.closest('form').submit();">
                                        {{ __('Delete') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    <p class="mt-4 text-lg text-gray-900">{{ $author->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
