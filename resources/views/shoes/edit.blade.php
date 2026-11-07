
@extends('layouts.app')

@section('title', 'Edit Shoe')

@section('content')

    <h2>Edit Shoe</h2>

    <form method="POST" action="{{ route('shoe.update', $shoe) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name">Shoe Name</label>
            <input type="text" name="name" id="name"
                class="form-control"
                value="{{ old('name', $shoe->name) }}">

            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="brand">Brand</label>

            <select name="brand" id="brand" class="form-control">
                <option value="">Select Brand</option>
                <option value="Nike" @selected(old('brand', $shoe->brand) == 'Nike')>Nike</option>
                <option value="Converse" @selected(old('brand', $shoe->brand) == 'Converse')>Converse</option>
                <option value="Puma" @selected(old('brand', $shoe->brand) == 'Puma')>Puma</option>
                <option value="Vans" @selected(old('brand', $shoe->brand) == 'Vans')>Vans</option>
                <option value="ASICS" @selected(old('brand', $shoe->brand) == 'ASICS')>ASICS</option>
                <option value="New Balance" @selected(old('brand', $shoe->brand) == 'New Balance')>New Balance</option>
            </select>

            @error('brand')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category_id">Category</label>

            <select name="category_id" id="category_id" class="form-control">
                <option value="">Select Category</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @selected(old('category_id', $shoe->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price">Price</label>
            <input type="number" name="price" id="price"
                class="form-control"
                value="{{ old('price', $shoe->price) }}">

            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Update Shoe
        </button>

        <a href="{{ route('shoe.index') }}" class="btn btn-secondary">
            Cancel
        </a>
    </form>

@endsection
