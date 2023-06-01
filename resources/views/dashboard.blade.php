<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            <div class="container">
            
            <h1>Add New Country</h1>

            <form method="POST" action="{{ route('states.store') }}">

                @csrf

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="iso">ISO:</label>
                    <input type="text" name="iso" id="iso" class="form-control" pattern="[A-Z]{2}" required>
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>

        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-4">
                        {{ __('List of Countries') }}
                    </h2>
                    <table class="table-auto">
    <thead>
        <tr>
            <th class="border px-4 py-2">#</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">ISO</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($states as $state)
            @if ($state->user->is(auth()->user()))
                <tr>
                    <td class="border px-4 py-2">{{ $state->id }}</td>
                    <td class="border px-4 py-2">{{ $state->name }}</td>
                    <td class="border px-4 py-2">{{ $state->iso }}</td>
                    <td class="border px-4 py-2">
                    <x-dropdown-link :href="route('states.edit', $state)">
                                                {{ __('Edit') }}
                                            </x-dropdown-link>
                    </td>
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
    </div>

</x-app-layout>


