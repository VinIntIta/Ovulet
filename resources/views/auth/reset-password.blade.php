<x-layouts.app>


        <!-- Validation Errors -->

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <label for="email" :value="__('Email')" />

                <input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus />
            </div>

            <!-- Password -->
            <div>
                <label for="password" :value="__('Password')" />

                <input id="password" type="password" name="password" required />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" :value="__('Confirm Password')" />

                <input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
            </div>

            <div >
                <button>
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
</x-layouts.app>
