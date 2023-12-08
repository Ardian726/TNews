<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="auto">

<head>
    <script src="{{ asset('assets/color-modes.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Playfair&#43;Display:700,900&amp;display=swap" rel="stylesheet">

    {{-- CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/blog.css') }}">
</head>

<body>
    <div class="container">
        <header class="border-bottom lh-1 py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-6">
                    <a class="blog-header-logo text-body-emphasis text-decoration-none" href="#">TNews<span
                            class="text-danger">.</span></a>
                </div>
                <div class="col-6 d-flex justify-content-end align-items-center">
                    @if (Route::has('login'))
                        <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                            @auth
                                <a href="{{ url('/home') }}" class="btn btn-sm btn-primary">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-sm btn-primary">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}"
                                        class="ml-4 btn btn-sm btn-outline-primary">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </header>

        <div class="nav-scroller py-1 mb-3 border-bottom">
            <nav class="nav nav-underline justify-content-between">
                <a class="nav-item nav-link link-body-emphasis active" href="#">World</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Technology</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Design</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Culture</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Business</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Politics</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Opinion</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Science</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Health</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Style</a>
                <a class="nav-item nav-link link-body-emphasis" href="#">Travel</a>
            </nav>
        </div>
    </div>

    <main class="container">
        {{-- Hero --}}
        <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
            <div class="col-lg-6 px-0">
                <h1 class="display-4 fst-italic">All the latest news from around the world is here</h1>
                <p class="lead my-3">
                    Multiple lines of text that form the lede, informing new readers quickly and
                    efficiently about what’s most interesting in this post’s contents.
                </p>
            </div>
        </div>

        {{-- News Card --}}
        <h3 class="pb-4 mb-4 fst-italic border-bottom">
            Update News<span class="text-danger">.</span>
        </h3>
        <div class="mb-4">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
                @foreach ($allBerita as $item)
                    <div class="col">
                        <div class="card shadow-sm">
                            <img src="{{ asset('img/cover/' . $item->cover) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <span
                                    class="badge bg-primary-subtle border border-primary-subtle text-primary-emphasis">
                                    {{ $item->kategori->nama_kategori }}
                                </span>
                                <h5 class="card-title py-4">{{ Str::limit($item->judul, 30) }}</h5>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ route('single', $item->id) }}"
                                            class="btn btn-sm btn-outline-secondary">Read</a>
                                    </div>
                                    <small class="text-body-secondary">
                                        {{ $item->created_at->format('F j, Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </main>

    <footer class="py-5 text-center text-body-secondary bg-body-tertiary">
        <h1>TNews<span class="text-danger">.</span></h1>
        <p>
            Website build with
            <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://instagram.com/aaardnnn">@aaardnnn</a>
        </p>
        <p class="mb-0">
            <a href="#" class="btn btn-primary">Back to top</a>
        </p>
    </footer>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</body>

</html>
