<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500"></x-application-logo>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="flex flex-row gap-2">
                <!-- Firstname -->
                <div class="mt-4">
                    <x-label for="firstname" :value="__('Firstname')"></x-label>
                    <x-input id="firstname" class="inline-block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus></x-input>
                </div>


                <!-- Lastname -->
                <div class="mt-4">
                    <x-label for="lastname" :value="__('Lastname')"></x-label>
                    <x-input id="lastname" class="inline-block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required></x-input>
                </div>
            </div>


            <!-- Email Address -->
            <div class="mt-1">
                <x-label for="email" :value="__('Email')"></x-label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required></x-input>
            </div>


            <!-- Phone Number -->
            <div class="mt-1">
                <x-label for="phone" :value="__('Phone')"></x-label>
                <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required></x-input>
            </div>

            <!-- Address -->
            <div class="mt-4">
                <x-label for="adress" :value="__('Adress')"></x-label>
                <x-input id="adress" class="block mt-1 w-full" type="text" name="adress" :value="old('adress')" required></x-input>
            </div>

            <div class="mt-1 flex flex-row gap-1">
                <!-- Postcode -->
                <div class="mt-1">
                    <x-label for="postcode" :value="__('Postcode')"></x-label>
                    <x-input id="postcode" class="block mt-1 w-1/2" type="text" name="postcode" :value="old('postcode')" required></x-input>
                </div>

                <!-- City -->
                <div class="mt-1">
                    <x-label for="city" :value="__('City')"></x-label>
                    <x-input id="city" class="block mt-1 w-full" type="text" name="city" :value="old('city')" required></x-input>
                </div>
            </div>

            <!-- Payment Method -->
            <div class="mt-6">
                <x-label for="payment_method" :value="__('Payment Method')"></x-label>
                <select id="payment_method"
                        class="block mt-1 w-full"
                        type="text"
                        name="payment_method"
                        :value="old('payment_method')" required>

                    <option value="credit">Credit</option>
                    <option value="monthly">Monthly</option>
                    <option value="annual">Annual</option>
                </select>
            </div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')"></x-label>
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password"></x-input>
            </div>


            <!-- Confirm Password -->
            <div class="mt-1">
                <x-label for="password_confirmation" :value="__('Confirm Password')"></x-label>

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required></x-input>
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
