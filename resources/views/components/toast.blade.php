@push('scripts')
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: '{{ $position }}',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        Toast.fire({
            icon: '{{ $icon }}',
            title: '{{ $title }}',
            text: '{{ $text }}',
        });
    </script>
@endpush
