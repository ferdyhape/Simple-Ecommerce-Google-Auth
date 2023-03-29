<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script></script>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function(event) {
        const showNavbar = (toggleId, navId, bodyId, headerId) => {
            const toggle = document.getElementById(toggleId),
                nav = document.getElementById(navId),
                bodypd = document.getElementById(bodyId),
                headerpd = document.getElementById(headerId);

            // Validate that all variables exist
            if (toggle && nav && bodypd && headerpd) {
                toggle.addEventListener("click", () => {
                    // show navbar
                    nav.classList.toggle("show-sidebar");
                    // change icon
                    toggle.classList.toggle("bx-x");
                    // add padding to body
                    bodypd.classList.toggle("body-pd");
                    // add padding to header
                    headerpd.classList.toggle("body-pd");
                });
            }
        };

        showNavbar("header-toggle", "nav-bar", "body-pd", "header");

        /*===== LINK ACTIVE =====*/
        const linkColor = document.querySelectorAll(".nav_link");

        function colorLink() {
            if (linkColor) {
                linkColor.forEach((l) => l.classList.remove("active"));
                this.classList.add("active");
            }
        }
        linkColor.forEach((l) => l.addEventListener("click", colorLink));

        // Your code to run since DOM is loaded and ready
    });
</script>
@if (Request::is('dashboard/category'))
    <script>
        $('body').on('click', '.delete-confirm', function() {
            let id = $(this).data('id');
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

        $('body').on('click', '#btn_edit_modal', function() {
            let id = $(this).data('id');
            let email = $(this).data('email');
            let name = $(this).data('name');
            document.getElementById('input_name').value = name;
            document.getElementById("form_edit_modal").action = `/dashboard/category/${id}`;
        });

        let table = document.getElementById('category-table');
        fetch('http://127.0.0.1:8000/api/category')
            .then(response => response.json())
            .then(data => {
                data.categories.forEach((element, index) => {
                    let row = document.createElement('tr');
                    row.innerHTML =
                        `
                    <td>${index+1}</td>
                    <td>${element.name}</td>
                    <td>
                        <button class="badge bg-warning border-0 text-white p-2 mx-2" data-bs-toggle="modal"
                            data-bs-target="#editModal" id="btn_edit_modal" data-id="${element.id}"
                            data-name="${element.name}"><i class="fas fa-fw fa-pencil"
                                style="font-size: 18px;"></i></button>
                        <button class="badge bg-danger border-0 p-2 mx-2 delete-confirm"
                            data-id="${element.id}" data-name="${element.name}"><i
                                class="fas fa-fw fa-trash text-white" style="font-size: 18px;"></i></button>
                        <form action="category/${element.id}" id="form-delete-${element.id}" method="POST"
                           style="display: none">
                            @method('delete')
                            @csrf
                            <input type="submit" class="" value="Delete">         
                        </form>
                    </td>`;
                    table.append(row);
                })
            })
            .catch(err => console.error(err));
    </script>
@elseif(Request::is('dashboard/product'))
    <script>
        $('body').on('click', '.delete-confirm', function() {
            let id = $(this).data('id');
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

        $('body').on('click', '#btn_edit_modal', function() {
            let id = $(this).data('id');
            document.getElementById('input_name').value = $(this).data('name');
            document.getElementById('input_price').value = $(this).data('price');
            document.getElementById('input_sum').value = $(this).data('sum');
            document.getElementById('input_description').value = $(this).data('description');
            let category_id = $(this).data('category_id');
            console.log(category_id);


            let selectedOption = document.querySelector(`#category_id option[value="${category_id}"]`);


            if (selectedOption) {
                selectedOption.selected = true;
            }

            let selectElement = document.querySelector('#category_id');
            selectElement.dispatchEvent(new Event('change'));

            document.getElementById("form_edit_modal").action = `/dashboard/product/${id}`;
        });

        let table = document.getElementById('product-table');
        fetch('http://127.0.0.1:8000/api/product')
            .then(response => response.json())
            .then(data => {
                data.products.forEach((element, index) => {
                    let row = document.createElement('tr');
                    row.innerHTML =
                        `
                    <td>${index+1}</td>
                    <td>${element.product_name}</td>
                    <td>${element.price}</td>
                    <td>${element.sum}</td>
                    <td>${element.description}</td>
                    <td>${element.name}</td>
                    <td>
                        <button class="badge bg-warning border-0 text-white p-2 mx-2" data-bs-toggle="modal"
                            data-bs-target="#editModal" id="btn_edit_modal" 
                            data-id="${element.id}" data-name="${element.product_name}" data-price="${element.price}" data-sum="${element.sum}" data-description="${element.description}" data-category_id="${element.category_id}" 
                            ><i class="fas fa-fw fa-pencil"
                                style="font-size: 18px;"></i></button>
                        <button class="badge bg-danger border-0 p-2 mx-2 delete-confirm"
                            data-id="${element.id}" data-name="${element.product_name}"><i
                                class="fas fa-fw fa-trash text-white" style="font-size: 18px;"></i></button>
                        <form action="product/${element.id}" id="form-delete-${element.id}" method="POST"
                           style="display: none">
                            @method('delete')
                            @csrf
                            <input type="submit" class="" value="Delete">         
                        </form>
                    </td>`;
                    table.append(row);
                })
            })
            .catch(err => console.error(err));
    </script>
@else
@endif
