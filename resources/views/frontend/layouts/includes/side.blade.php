<div class="side py-2 d-none d-lg-block">
    <nav class="nav flex-column">
        @foreach (App\Models\Category::all() as $category)
            <a class="nav-link text-dark" href="{{ route('category', $category->id) }}">{{ $category->name }}</a>
        @endforeach
    </nav>
</div>
