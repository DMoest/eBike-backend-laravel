<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="109.536" height="140.016" viewBox="0 0 27.384 35.004"><g transform="translate(1.692)"><path d="M0,0H24V24H0Z" fill="none"/><path d="M12,12a2,2,0,1,1,2-2A2,2,0,0,1,12,12Zm6-1.8a6,6,0,0,0-12,0c0,2.34,1.95,5.44,6,9.14C16.05,15.64,18,12.54,18,10.2ZM12,2a7.955,7.955,0,0,1,8,8.2q0,4.98-8,11.8Q4.005,15.175,4,10.2A7.955,7.955,0,0,1,12,2Z" fill="#2bb786"/></g><path d="M2.258-8.242H5.5V-7.3H1.206v-5.3H5.421v.938H2.258v1.211H4.989v.923H2.258Zm9.012-1.869a1.39,1.39,0,0,1,.632.45,1.334,1.334,0,0,1,.261.866,1.342,1.342,0,0,1-.477,1.1,2.036,2.036,0,0,1-1.324.39H7.494v-5.3h2.845a1.787,1.787,0,0,1,1.214.363,1.227,1.227,0,0,1,.412.969,1.157,1.157,0,0,1-.7,1.1ZM8.546-11.737v1.286h1.672a.663.663,0,0,0,.5-.174.652.652,0,0,0,.17-.477.617.617,0,0,0-.178-.462.647.647,0,0,0-.473-.174Zm1.771,3.572a.74.74,0,0,0,.552-.193.7.7,0,0,0,.189-.511.725.725,0,0,0-.2-.518.714.714,0,0,0-.545-.208H8.546v1.43ZM15.25-12.6v5.3H14.168v-5.3Zm5.97,5.3L19.139-9.535h-.545V-7.3H17.512v-5.3h1.082v2.1h.545l1.854-2.1h1.286l-2.24,2.512v.053l2.5,2.732Zm4.131-.938H28.59V-7.3H24.3v-5.3h4.215v.938H25.351v1.211h2.732v.923H25.351Z" transform="translate(-1.206 42.304)"/></svg>
                {{--                <x-application-logo class="w-20 h-20 fill-current text-gray-500"></x-application-logo>--}}
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"></x-auth-session-status>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors"></x-auth-validation-errors>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')"></x-label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus></x-input>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')"></x-label>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password"></x-input>
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
