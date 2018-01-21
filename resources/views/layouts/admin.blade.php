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
                            @include('components._menu_admin')
                        </div>
                        <div class="col-md-9">
                                @yield('content')
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