<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script>
    $('body').on('click', '.delete-confirm', function() {
        let id = $(this).data('id');
        console.log(id);
        let name = $(this).data('name').toUpperCase();

        Swal.fire({
            title: 'Are you sure?',
            text: `You want to delete ${name}`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById(`form-delete-${id}`).submit()
            }
        })

    });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
