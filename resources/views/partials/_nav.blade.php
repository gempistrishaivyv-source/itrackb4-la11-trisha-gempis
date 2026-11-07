
<nav class="nav mb-4">
    <a class="nav-link {{ request()->is('shoe') || (request()->is('shoe/*') && !request()->is('shoes/featured')) ? 'active' : '' }}"
       href="{{ route('shoe.index') }}">Shoe List</a>

    <a class="nav-link {{ request()->is('shoes/featured') ? 'active' : '' }}"
       href="{{ route('shoes.featured') }}">Featured Shoe</a>
</nav>
