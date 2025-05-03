<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Str;
use App\Models\Approval;

class PendingForms extends Component
{
    public $selectedUser, $showModal = false, $actionType, $remark;

    public function viewUser($id)
    {
        $user = User::find($id);
        if (auth()->user()->position === 'admin' || auth()->user()->id === $user->id) {
            $this->selectedUser = $user;
            $this->showModal = true;
            $this->remark = '';
            $this->actionType = null;
        }
    }

    public function approve()
    {
        $subjectCode = [
            'English' => 'TENG',
            'Maths' => 'TMTS',
            'Hindi' => 'THIN',
            'Agriculture' => 'TAGR',
        ];

        $regNo = 'CED/' . ($subjectCode[$this->selectedUser->subject] ?? 'TGEN') . '/2024/' . rand(100000, 999999);
        $this->selectedUser->update([
            'form_status' => 'approved',
            'registration_no' => $regNo,
            'admin_remark' => $this->remark,
        ]);

        Approval::create([
            'user_id' => $this->selectedUser->id,
            'approved_by' => auth()->id(),
            'status' => 'approved',
            'remarks' => $this->remark,
            'registration_no' => $regNo,
            'approved_at' => now(),
        ]);

        $this->resetModal();
    }

    public function reject()
    {
        $this->selectedUser->update([
            'form_status' => 'rejected',
            'admin_remark' => $this->remark,
        ]);

        Approval::create([
            'user_id' => $this->selectedUser->id,
            'approved_by' => auth()->id(),
            'status' => 'rejected',
            'remarks' => $this->remark,
            'registration_no' => null,
            'approved_at' => now(),
        ]);

        $this->resetModal();
    }

    public function resetModal()
    {
        $this->selectedUser = null;
        $this->showModal = false;
        $this->remark = '';
    }

    public function render()
    {
        if (auth()->user()->position === 'admin') {
            $users = User::get();
        } else {
            $users = User::where('id', auth()->user()->id)->get();
        }

        return view('livewire.admin.pending-forms', [
            'users' => $users
        ]);
    }
}
