<div class="overflow-x-auto">
    <table class="min-w-full bg-white border border-gray-200">
        <!-- Multi-level table header -->
        <thead class="bg-gray-100">
            <tr>
                <th rowspan="2" class="px-4 py-2 border font-semibold">HOA DETAILS</th>
                {{-- <th rowspan="2" class="px-4 py-2 border">FY</th>
                <th rowspan="2" class="px-4 py-2 border">DEPT</th> --}}
                <th colspan="3" class="px-4 py-2 border font-semibold">TARGET AMOUNT</th>
                <th colspan="3" class="px-4 py-2 border font-semibold">APPROVAL AMOUNT</th>
                <th rowspan="2" class="px-4 py-2 border font-semibold">ACTION</th>
            </tr>
            <tr>
                <th class="px-4 py-2 border font-semibold">ALLOWED</th>
                <th class="px-4 py-2 border font-semibold">AVAILABLE</th>
                <th class="px-4 py-2 border font-semibold">BLOCK</th>
                <th class="px-4 py-2 border font-semibold">ALLOWED</th>
                <th class="px-4 py-2 border font-semibold">AVAILABLE</th>
                <th class="px-4 py-2 border font-semibold">BLOCK</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($target_limits as $target_limit)
                <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                    <td class="px-4 py-2 border">{{ $target_limit->headOfAccount->ref_code }}</td>
                    {{-- <td class="px-4 py-2 border">{{ $target_limit->financialYear->name }}</td>
                    <td class="px-4 py-2 border">{{ $target_limit->department->name }}</td> --}}
                    <td class="px-4 py-2 border">{{ number_format($target_limit->target_allowed_amount, 2) }}
                    </td>
                    <td class="px-4 py-2 border">{{ number_format($target_limit->target_available_amount, 2) }}
                    </td>
                    <td class="px-4 py-2 border">{{ number_format($target_limit->target_block_amount, 2) }}</td>
                    <td class="px-4 py-2 border">{{ number_format($target_limit->approval_allowed_amount, 2) }}
                    </td>
                    <td class="px-4 py-2 border">
                        {{ number_format($target_limit->approval_available_amount, 2) }}</td>
                    <td class="px-4 py-2 border">{{ number_format($target_limit->approval_block_amount, 2) }}
                    </td>
                    <td class="px-4 py-2 border text-center">
                        <div class="flex justify-center gap-2">
                            <button class="bg-blue-100 text-blue-800 p-1.5 rounded-full border border-blue-300"
                                type="button"
                                @click="$dispatch('open-edit-target-limit', { target_limit: '{{ $target_limit->id }}' })">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-4 h-4">
                                    <path
                                        d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                    <path
                                        d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                </svg>
                            </button>
                            <button class="bg-red-100 text-red-600 p-1.5 rounded-full border border-red-300"
                                type="button" onclick="confirmDeleteTargetLimit('{{ $target_limit->id }}')">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                    class="w-4 h-4">
                                    <path fill-rule="evenodd"
                                        d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="10" class="px-4 py-2 text-center text-gray-500">No target limits found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <!-- Pagination -->
    <div class="mt-4">
        {{ $target_limits->links() }}
    </div>
</div>
