<x-app-layout>
        <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit') }}
                </h2>
            </x-slot>
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            @if($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
                <form method="POST" action="{{ route('states.update', $state) }}">
                    @csrf
                    @method('patch')
                    <textarea
                        name="name"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        maxlength="30"
                    >{{ old('name', $state->name) }}</textarea>
                    
                    <textarea
                        name="iso"
                        class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                        pattern="[A-Z]{2}"
                    >{{ old('iso', $state->iso) }}</textarea>
                    <div class="mt-4 space-x-2">
                    <x-button>{{ __('Save') }}</x-button>
                        <a href="{{ route('states.index') }}">{{ __('Cancel') }}</a>
                    </div>
                </form>
            </div>
</x-app-layout>