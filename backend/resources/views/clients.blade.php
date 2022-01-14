
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Clients') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p>Here are a list of your clients:</p>
                    @foreach($clients as $client)
                        <div class="py-3 text-gray-900">
                            <h3 class="text-lg text-gray-500">{{ $client->name }} </h3>
                            <p><b>Client ID: </b>{{ $client->id }} </p>
{{--                            <p><b>Client Name: </b>{{ $client->name }} </p>--}}
                            <p><b>Client Redirect: </b>{{ $client->redirect  }} </p>
                            <p><b>Client Secret: </b>{{ $client->secret }} </p>
{{--                            <p><b>Client Provider:</b>{{ $client->provider }} </p>--}}
                            <br>
                            <p><b>Registered with User ID: </b>{{ $client->user_id }} </p>
                            <p><b>Created: </b>{{ $client->created_at }} </p>
                            <p><b>Updated: </b>{{ $client->updated_at }} </p>

                            <br>
                        </div>
                    @endforeach
                </div>


                <form action="/oauth/authorize?client_id={{ $client->id }}&response_type=code&redirect_uri={{ $client->redirect }}&scope=api_admin&state={{ Str::random(40) }}" method="get" class="block m-4">
                    @csrf
                    <button class="w-1/2 p-2 bg-gray-800 text-white rounded" type="submit">Authorize Frontend Client</button>
                </form>


                <div class="mt-3 p-6 bg-white border-b border-gray-200">
                    <form action="/oauth/clients" method="POST">
                        <h2 class="text-xl mb-4"><b>Register new client</b></h2>
                        <div class="mt-2">
                            <x-label for="name">Name</x-label>
                            <x-input class="w-full sm:w-1/2" type="text" name="name" placeholder="Client Name"></x-input>
                        </div>
                        <div class="mt-2">
                            <x-label for="redirect">Redirect</x-label>
                            <x-input class="w-full sm:w-1/2" type="text" name="redirect" placeholder="https://my-url.com/callback"></x-input>
                        </div>
                        <div class="mt-6">
                            @csrf
                            <x-button class="w-full sm:w-1/2" type="submit"><p class="w-full py-2 text-center">Create Client<p></p></x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
