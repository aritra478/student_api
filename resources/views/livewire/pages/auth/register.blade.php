<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; // Corrected import

new #[Layout('layouts.guest')] class extends Component {
    public $already_applied = 'no';
    public $post = 'Teacher';
    public $subject;
    public $gender;
    public $is_physically_handicapped = 'no';
    public $handicap_details;
    public $category;
    public $dob;
    public $full_name;
    public $mobile_no;
    public $email;
    public $password;
    public $password_confirmation;

    public function register()
    {
        $validatedData = $this->validateData();
        
        try {
            DB::beginTransaction(); 
            
            $user = User::create([
                'applied_before' => $this->already_applied === 'yes',
                'post' => $this->post,
                'subject' => $this->subject,
                'gender' => $this->gender,
                'is_physically_handicapped' => $this->is_physically_handicapped === 'yes',
                'handicap_details' => $this->handicap_details,
                'category' => $this->category,
                'dob' => $this->dob,
                'full_name' => $this->full_name,
                'mobile' => $this->mobile_no,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            event(new Registered($user));

            DB::commit(); 

            return redirect()->route('verification.notice')->with('message', 'Please check your email to verify your account.');
        Auth::user()->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());

            return redirect()->back()->withErrors(['error' => 'An error occurred during registration.']);
        }
    }

    public function validateData()
    {
        // Calculate age
        $age = Carbon::parse($this->dob)->diffInYears(Carbon::create(null, 1, 1));
        $maxAge = 40;
        $category = $this->category;
        $gender = $this->gender;

        if ($category === 'General') {
            $maxAge = $gender === 'Male' ? 45 : 40;
        } elseif ($category === 'ST') {
            $maxAge = $gender === 'Female' ? 45 : 43;
        } elseif ($category === 'SC') {
            $maxAge = $gender === 'Female' ? 48 : 45;
        } elseif ($category === 'OBC') {
            $maxAge = $gender === 'Female' ? 50 : 47;
        }

        // Validate fields
        return Validator::make($this->only(['already_applied', 'post', 'subject', 'gender', 'is_physically_handicapped', 'handicap_details', 'category', 'dob', 'full_name', 'mobile_no', 'email', 'password', 'password_confirmation']), [
            'already_applied' => 'required|in:yes,no',
            'post' => 'required|in:Teacher',
            'subject' => 'required|in:English,Maths,Hindi,Agriculture',
            'gender' => 'required|in:Male,Female,Others',
            'is_physically_handicapped' => 'required|in:yes,no',
            'handicap_details' => 'required_if:is_physically_handicapped,yes',
            'category' => 'required|in:General,ST,SC,OBC',
            'dob' => [
                'required',
                'date',
                function ($attr, $value, $fail) use ($age, $maxAge) {
                    if ($age < 25 || $age > $maxAge) {
                        $fail("Your age must be between 25 and {$maxAge} years as of 01-01-2024.");
                    }
                },
            ],
            'full_name' => 'required|string|max:255',
            'mobile_no' => 'required|digits:10|unique:users,mobile',
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ])->validate();
    }
};
?>

<div x-data="{ isHandicapped: @entangle('is_physically_handicapped') === 'yes' }">
    <form wire:submit="register" class="flex flex-col gap-6">

        <!-- Already Applied -->
        <div class="mt-4">
            <x-input-label value="Have you already applied in Advt. No. 01/2024?" />
            <select wire:model="already_applied" class="block mt-1 w-full">
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select>
            <x-input-error :messages="$errors->get('already_applied')" class="mt-2" />
        </div>

        <!-- Post -->
        <div class="mt-4">
            <x-input-label value="Post" />
            <x-text-input value="Teacher" readonly class="block mt-1 w-full" />
        </div>

        <!-- Subject -->
        <div class="mt-4">
            <x-input-label value="Subject" />
            <select wire:model="subject" class="block mt-1 w-full">
                <option value="">Select Subject</option>
                @foreach (['English', 'Maths', 'Hindi', 'Agriculture'] as $subjectOption)
                    <option value="{{ $subjectOption }}">{{ $subjectOption }}</option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('subject')" class="mt-2" />
        </div>
        
        <!-- Gender -->
        <div class="mt-4">
            <x-input-label value="Gender" />
            <select wire:model="gender" class="block mt-1 w-full">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Others">Others</option>
            </select>
            <x-input-error :messages="$errors->get('gender')" class="mt-2" />
        </div>

        <!-- Physically Handicapped -->
        <div class="mt-4">
            <x-input-label value="Are you physically handicapped?" />
            <select wire:model="is_physically_handicapped" class="block mt-1 w-full"
                x-on:change="isHandicapped = $event.target.value === 'yes'">
                <option value="no">No</option>
                <option value="yes">Yes</option>
            </select>
            <x-input-error :messages="$errors->get('is_physically_handicapped')" class="mt-2" />
        </div>

        <!-- Handicap Details -->
        <div class="mt-4" x-show="isHandicapped" x-transition>
            <x-input-label value="Handicap Details" />
            <x-text-input wire:model="handicap_details" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('handicap_details')" class="mt-2" />
        </div>

        <!-- Category -->
        <div class="mt-4">
            <x-input-label value="Category" />
            <select wire:model="category" class="block mt-1 w-full">
                <option value="">Select Category</option>
                <option value="General">General</option>
                <option value="ST">ST</option>
                <option value="SC">SC</option>
                <option value="OBC">OBC</option>
            </select>
            <x-input-error :messages="$errors->get('category')" class="mt-2" />
        </div>

        <!-- Date of Birth -->
        <div class="mt-4">
            <x-input-label value="Date of Birth" />
            <x-text-input type="date" wire:model="dob" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('dob')" class="mt-2" />
        </div>

        <!-- Full Name -->
        <div class="mt-4">
            <x-input-label for="full_name" :value="'Full Name'" />
            <x-text-input wire:model="full_name" id="full_name" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('full_name')" class="mt-2" />
        </div>

        <!-- Mobile Number -->
        <div class="mt-4">
            <x-input-label value="Mobile Number" />
            <x-text-input wire:model="mobile_no" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('mobile_no')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-input-label for="email" :value="'Email (Username)'" />
            <x-text-input wire:model="email" id="email" type="email" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="'Password'" />
            <x-text-input wire:model="password" id="password" type="password" class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="'Confirm Password'" />
            <x-text-input wire:model="password_confirmation" id="password_confirmation" type="password"
                class="block mt-1 w-full" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Submit -->
        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="danger" class="w-full">
                {{ __('Create account') }}
            </flux:button>
        </div>

    </form>
</div>
