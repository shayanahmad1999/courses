@include('layouts.head')
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="{{url('/backend')}}" class="text-gray-500">User Login</a><span class="display-4 text-gray-500"> | </span><i class="fas fa-user display-4"><span class="w-20 h-20 fill-current display-5 text-gray-500"> Admin Login</span></i>          
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('backend.admin.adminlogincheck') }}">

            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
            @else
                
            @endif

            @csrf

            <!-- Email Address -->
            <div>
                <label for="email">Email</label>

                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div>
                <label for="email">Password</label>

                <input id="password" class="form-control" type="password" name="password" :value="old('email')" required autofocus />
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
