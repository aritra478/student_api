<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyEmailController extends Controller
{
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('login')->with('message', 'Your email is already verified.');
        }
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
        return redirect()->route('login')->with('message', 'Your email has been verified. Please log in to continue.');
    }
}
