<!doctype html>
<html @php(language_attributes())>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @php(do_action('get_header'))
    @php(wp_head())
    @include('partials.theme')
    @include('partials.variables')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>

  <body @php(body_class('antialiased'))>
    @php(wp_body_open())

    <div 
      id="app"
      @class([
        'min-h-[calc(100dvh-32px)] xl:min-h-[calc(100vh-32px)] flex flex-col' => is_user_logged_in() == true,
        'min-h-dvh xl:min-h-screen flex flex-col' => is_user_logged_in() == false,
      ])
    >
      <a class="sr-only focus:not-sr-only" href="#main">
        {{ __('Skip to content', 'sage') }}
      </a>

      @include('sections.header')

      <main 
        id="main" 
        data-theme="light" 
        class="main flex-grow bg-background text-foreground"
      >
        @yield('content')
      </main>

      @include('sections.footer')
    </div>

    @php(do_action('get_footer'))
    @php(wp_footer())
  </body>
</html>
