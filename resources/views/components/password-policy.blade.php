<div class="flex items-center" x-data>
    <a class="flex text-sm text-red-500 hover:text-red-700 cursor-pointer"
        onclick="
        const Toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-right',
                    showConfirmButton: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer)
                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                });

                Toast.fire({
                    icon: 'info',
                    title: 'Password Policy',
                    text: 'Minimum 8 Characters, with atleast one of each Uppercase, Lowercase, Number and Special Character',
                });">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2">
            <path fill-rule="evenodd"
                d="M10 1a4.5 4.5 0 00-4.5 4.5V9H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2v-6a2 2 0 00-2-2h-.5V5.5A4.5 4.5 0 0010 1zm3 8V5.5a3 3 0 10-6 0V9h6z"
                clip-rule="evenodd" />
        </svg>


        {{ __('Password Policy') }}
    </a>
</div>
