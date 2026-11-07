
@extends('layouts.app')

@section('title', 'Shoe Collection')

@section('content')
<h2>Shoe List</h2>

<p>
    <a href="{{ route('shoe.create') }}" class="btn btn-primary">
        Add Shoe
    </a>
</p>

<p>Category: {{ $category }} | Brand: {{ $brand }}</p>

<p>
    <strong>Number of Queries: {{ $queryCount }}</strong>
</p>

<h5>Filter by Category</h5>

@if ($brand === 'all')
    <a href="{{ route('shoe.index') }}">All Categories</a>
    <a href="{{ route('shoe.index', ['category'=>'Sneakers']) }}">Sneakers</a>
    <a href="{{ route('shoe.index', ['category'=>'Casual']) }}">Casual</a>
    <a href="{{ route('shoe.index', ['category'=>'Running']) }}">Running</a>
@else
    <a href="{{ route('shoe.index', ['brand'=>$brand]) }}">All Categories</a>
    <a href="{{ route('shoe.index', ['category'=>'Sneakers','brand'=>$brand]) }}">Sneakers</a>
    <a href="{{ route('shoe.index', ['category'=>'Casual','brand'=>$brand]) }}">Casual</a>
    <a href="{{ route('shoe.index', ['category'=>'Running','brand'=>$brand]) }}">Running</a>
@endif

<h5>Filter by Brand</h5>

@if ($category === 'all')
    <a href="{{ route('shoe.index') }}">All Brands</a>
    <a href="{{ route('shoe.index', ['brand'=>'Nike']) }}">Nike</a>
    <a href="{{ route('shoe.index', ['brand'=>'Converse']) }}">Converse</a>
    <a href="{{ route('shoe.index', ['brand'=>'Puma']) }}">Puma</a>
    <a href="{{ route('shoe.index', ['brand'=>'Vans']) }}">Vans</a>
    <a href="{{ route('shoe.index', ['brand'=>'ASICS']) }}">ASICS</a>
    <a href="{{ route('shoe.index', ['brand'=>'New Balance']) }}">New Balance</a>
@else
    <a href="{{ route('shoe.index', ['category'=>$category]) }}">All Brands</a>
    <a href="{{ route('shoe.index', ['category'=>$category,'brand'=>'Nike']) }}">Nike</a>
    <a href="{{ route('shoe.index', ['category'=>$category,'brand'=>'Converse']) }}">Converse</a>
    <a href="{{ route('shoe.index', ['category'=>$category,'brand'=>'Puma']) }}">Puma</a>
    <a href="{{ route('shoe.index', ['category'=>$category,'brand'=>'Vans']) }}">Vans</a>
    <a href="{{ route('shoe.index', ['category'=>$category,'brand'=>'ASICS']) }}">ASICS</a>
    <a href="{{ route('shoe.index', ['category'=>$category,'brand'=>'New Balance']) }}">New Balance</a>
@endif

<p>
    <a href="{{ route('shoe.index') }}">Clear Both Filters</a>
</p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Shoe</th>
            <th>Brand</th>
            <th>Category</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($shoes as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td>
                <td>
                    <a href="{{ route('shoe.show', $item->id) }}">
                        {{ $item->name }}
                    </a>
                </td>
                <td>{{ $item->brand }}</td>
                <td>{{ $item->category->name }}</td>
                <td>
                    ₱{{ $item->price }}

                    @if ($item->price >= 8000)
                        <span class="badge bg-primary">Premium</span>
                    @endif
                </td>
                <td>
                    <form action="{{ route('shoe.destroy', $item) }}" method="POST"
                          onsubmit="return confirm('Delete this record?')">
                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger btn-sm">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">
                    No shoes are available in the collection.
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
