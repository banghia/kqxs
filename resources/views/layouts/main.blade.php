<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials._head')
    </head>
    <body>
        <div id="wrapper">
            <header>
                @include('partials._header')
            </header>
            <main>
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            @include('partials._menu_left')
                        </div>
                        <div class="col-md-6">
                                @yield('content')
                        </div>
                        <div class="col-md-3">
                            @include('partials._menu_right')
                        </div>
                    </div>
                </div>
            </main>
            <footer>
                @include('partials._footer')
            </footer>
        </div>
        @include('partials._scripts')
        @yield('scripts')
    </body>
</html>