<?php

// namespace App\Livewire\Auth;

// use Illuminate\Validation\ValidationException;
// use Livewire\Component;
// use Tymon\JWTAuth\Facades\JWTAuth;
// use Illuminate\Auth\Events\Lockout;
// use Illuminate\Support\Facades\RateLimiter;
// use Illuminate\Support\Str;
// use Livewire\Attributes\Layout;

// class Login extends Component
// {
//     public $email = '';
//     public $password = '';
//     public $token = null;

//     protected $rules = [
//         'email' => 'required|email',
//         'password' => 'required|string|min:6',
//     ];

//     public function login(): void
//     {
//         $this->validate();
//         $this->ensureIsNotRateLimited();

//         $credentials = [
//             'email' => $this->email,
//             'password' => $this->password,
//         ];

//         if (!$token = JWTAuth::attempt($credentials)) {
//             RateLimiter::hit($this->throttleKey());

//             throw ValidationException::withMessages([
//                 'email' => __('auth.failed'),
//             ]);
//         }

//         RateLimiter::clear($this->throttleKey());

//         $this->token = $token;
//         session(['jwt_token' => $token]);

//         $this->dispatch('jwt-generated', token: $token);
//         logger()->info('JWT Token: ' . $token);

//         $this->redirectIntended(default: route('dashboard', absolute: false), navigate: true);
//     }

//     protected function ensureIsNotRateLimited(): void
//     {
//         if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
//             return;
//         }

//         event(new Lockout(request()));

//         $seconds = RateLimiter::availableIn($this->throttleKey());

//         throw ValidationException::withMessages([
//             'email' => __('auth.throttle', [
//                 'seconds' => $seconds,
//                 'minutes' => ceil($seconds / 60),
//             ]),
//         ]);
//     }

//     protected function throttleKey(): string
//     {
//         return Str::transliterate(Str::lower($this->email) . '|' . request()->ip());
//     }

//     public function render()
//     {
//         return view('livewire.auth.login')
//             ->with([
//                 'layout' => 'components.layouts.auth.simple',
//                 'title' => 'Login'
//             ]);
//     }
// }
