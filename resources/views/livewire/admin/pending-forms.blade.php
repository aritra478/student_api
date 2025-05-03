<div class="p-4" style="margin-left: 15%">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Pending Applications</h2>

    <div class="overflow-x-auto rounded-lg shadow">
        <table class="min-w-full bg-white text-sm">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2 font-semibold text-gray-600">Name</th>
                    <th class="px-4 py-2 font-semibold text-gray-600">Subject</th>
                    <th class="px-4 py-2 font-semibold text-gray-600">Email</th>
                    <th class="px-4 py-2 font-semibold text-gray-600">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-t hover:bg-gray-50 transition">
                        <td class="px-4 py-2">{{ $user->full_name }}</td>
                        <td class="px-4 py-2">{{ $user->subject }}</td>
                        <td class="px-4 py-2">{{ $user->email }}</td>
                        <td class="px-4 py-2">
                            @if ($user->enrollment_status === 'enrolled')
                                @if ($user->form_status !== 'pending')
                                    <span
                                        class="inline-block px-3 py-1 text-sm rounded 
                                    {{ $user->form_status === 'approved' ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }}">
                                        {{ ucfirst($user->form_status) }}
                                    </span>
                                @else
                                    @if (auth()->user()->position === 'admin')
                                        <button wire:click="viewUser({{ $user->id }})"
                                            class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded transition">
                                            Approval
                                        </button>
                                    @endif
                                @endif
                                <a href="{{ route('applicant.acknowledgement', $user->id) }}"
                                    class="bg-gray-600 hover:bg-gray-700 text-white px-3 py-1 rounded transition">
                                    Download PDF
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Modal --}}
    @if ($showModal)
        <div class="fixed inset-0 bg-black bg-opacity-40 flex justify-center items-center z-50">
            <div class="bg-white rounded-xl shadow-lg w-full max-w-xl mx-4 p-6 relative">
                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                    Applicant: {{ $selectedUser->full_name }}
                </h3>
                <p class="text-gray-700 mb-4">Subject: {{ $selectedUser->subject }}</p>

                <label class="block text-gray-600 text-sm mb-1">Remark (optional):</label>
                <textarea wire:model="remark" class="w-full border border-gray-300 p-2 rounded mb-4 resize-none" rows="3"
                    placeholder="Add remark if any..."></textarea>

                <div class="flex justify-end gap-2">
                    <button wire:click="approve" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded"
                        style="background-color: green">
                        Approve
                    </button>
                    <button wire:click="reject" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                        Reject
                    </button>
                    <button wire:click="resetModal" class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded"
                        style="background-color: gray">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    @endif
</div>
