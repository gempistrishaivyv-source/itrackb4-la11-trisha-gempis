
@extends('layouts.app')

@section('title', $item['name'])

@section('content')

    <h2>{{ $item['name'] }}</h2>

    <div class="card">
        <div class="card-body">

            <p>
                <strong>ID:</strong>
                {{ $item['id'] }}
            </p>

            <p>
                <strong>Shoe:</strong>
                {{ $item['name'] }}
            </p>

            <p>
                <strong>Brand:</strong>
                {{ $item['brand'] }}
            </p>

            <p>
                <strong>Category:</strong>
                {{ $item->category->name }}
            </p>

            <p>
                <strong>Price:</strong>
                ₱{{ $item['price'] }}
            </p>

            <a
                class="btn btn-primary"
                href="{{ route('shoe.index') }}"
            >
                Back to Shoe List
            </a>

        </div>
    </div>

@endsection
