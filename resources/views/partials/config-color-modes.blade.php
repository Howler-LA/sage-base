<style id="color-modes">
  @if(get_field('colors','option')['variables'])
    :root {
      {!! preg_replace('/\s+/', '', get_field('colors','option')['variables']) !!}
    }
  @endif
  @if(get_field('colors','option')['color_modes'])
    @foreach(get_field('colors','option')['color_modes'] as $mode)
      [data-theme='{{ $mode['name'] }}'] {
        {{ preg_replace('/\s+/', '', $mode['variables']) }}
      }
    @endforeach
  @endif
</style>
