@extends('layouts.dashboard.master')
@section('title', 'Index')
@section('content')
    <h1 class="text-center fw-bold">Product List Management</h1>
    <hr class="hr" />
    <button class="btn btn-success my-2" data-bs-toggle="modal" data-bs-target="#createModal">Add Product</button>
    <div class="justify-content-center">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Sum</th>
                    <th scope="col">Description</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody id="product-table">
            </tbody>
        </table>
    </div>

    {{--  Modal Edit  --}}
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">
                        EDIT PRODUCT
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form_edit_modal" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text"
                                class="form-control form-control-product @error('name') is-invalid @enderror" name="name"
                                placeholder="Name" id="input_name" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <input type="number"
                                class="form-control form-control-product @error('price') is-invalid @enderror"
                                name="price" placeholder="Price" id="input_price" required>
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <input type="number"
                                class="form-control form-control-product @error('sum') is-invalid @enderror" name="sum"
                                placeholder="Sum" id="input_sum" required>
                            @error('sum')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <input type="text"
                                class="form-control form-control-product @error('description') is-invalid @enderror"
                                name="description" placeholder="Description" id="input_description">
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning mt-2">Edit</button>
                </div>
                </form>
            </div>
        </div>

    </div>

    {{--  Model Create  --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content border-0 shadow">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ADD PRODUCT</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('dashboard/product') }}" method="POST">
                        @csrf
                        <div class="form-group mb-2">
                            <input type="text"
                                class="form-control form-control-product @error('name') is-invalid @enderror" name="name"
                                placeholder="Name" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <input type="number"
                                class="form-control form-control-product @error('price') is-invalid @enderror"
                                name="price" placeholder="Price" required>
                            @error('price')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <input type="text"
                                class="form-control form-control-product @error('sum') is-invalid @enderror"
                                name="sum" placeholder="Sum" required>
                            @error('sum')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <input type="text"
                                class="form-control form-control-product @error('description') is-invalid @enderror"
                                name="description" placeholder="Description">
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"
                                name="category_id" required>
                                <option value="0">Choose a category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success ">Add</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
