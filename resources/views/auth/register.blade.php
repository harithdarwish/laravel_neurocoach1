<x-guest-layout>

    <style>
        .register-form {
            background-color: #98D0C1;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .login-button {
            background-color: #6366f1; /* Indigo background */
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .login-button:hover {
            background-color: #4f46e5; /* Darker indigo on hover */
        }    

    </style>

    <x-authentication-card>
        <x-slot name="logo">
          <img src="{{ asset('images/logologinNDL.png') }}" alt="Custom Logo" class="w-12 h-14">
        </x-slot>


        <div class="register-form">

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-2">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div  class="mt-2">
                <x-label for="name" value="{{ __('Phone') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autofocus autocomplete="phone" />
            </div>

            <div  class="mt-2">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div  class="mt-2">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center mt-4">
                <input type="checkbox" id="policy_checkbox" name="policy_checkbox" required class="mr-2"> 
            
            <label for="policy_checkbox" class="text-sm text-gray-600">
                I agree to the 
                <a href="{{ url('policy') }}" target="_blank" class="text-blue-500 underline hover:text-blue-700">Privacy Policy</a> 
                and 
                <a href="{{ url('policy') }}" target="_blank" class="text-blue-500 underline hover:text-blue-700">Terms of Service.</a>
            </label>
                </div>
    
            
              @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
              <div class="flex items-center mt-4">
                <x-label for="terms">
                  <div class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" required />
                    <div class="ml-2">
                      {!! __(' I agree to the :terms_of_service and :privacy_policy', [
                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="text-blue-500 underline hover:text-blue-700">Terms of Service</a>',
                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="text-blue-500 underline hover:text-blue-700">Privacy Policy</a>',
                      ]) !!}
                    </div>
                  </div>
                </x-label>
              </div>
              @endif

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 font-bold hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button class="login-button ms-4">
                        {{ __('Register') }}
                    </button>
                </div>

            </div> 
        </form>
    </x-authentication-card>
</x-guest-layout>
