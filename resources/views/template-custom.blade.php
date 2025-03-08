{{--
  Template Name: Blocks Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @layouts('content')
      @if(file_exists(get_theme_file_path('resources/views/partials/' . get_row_layout() . '.blade.php')))
        @include('partials/' . get_row_layout())
      @else
        <div class="py-12 bg-pink-100">
          <x-container>
            {{ get_row_layout() }}
          </x-container>
        </div>
      @endif
    @endlayouts
  @endwhile
@endsection
