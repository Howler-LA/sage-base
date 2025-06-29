{{--
  Template Name: Custom Template
--}}

@extends('layouts.app')
@section('content')
  @layouts('content')
    @if(file_exists(get_theme_file_path('resources/views/blocks/' . get_row_layout() . '.blade.php')))
      @include('blocks/' . get_row_layout())
    @else
      <div data-theme="White" class="py-12 border-t bg-background">
        <x-container>
          <div class="py-10 bg-pink-100 text-pink-400 border-1 border-dashed border-current rounded-lg text-center text-sm font-medium">
            {{ get_row_layout() }}
          </div>
        </x-container>
      </div>
    @endif
  @endlayouts
@endsection
