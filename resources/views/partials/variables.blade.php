<style id="variables">
  @if(get_field('breakpoints','option'))
    @foreach(get_field('breakpoints','option') as $breakpoint)
      @media (width >= {{ $breakpoint['breakpoint'] }}px) {
        :root {
          {{ preg_replace('/\s+/', '', $breakpoint['variables']) }}
          {{ preg_replace('/\s+/', '', $breakpoint['type_sizes']) }}
        }
      }
    @endforeach
  @endif
  @if($colors)
    :root {
      {!! preg_replace('/\s+/', '', $colors) !!}
    }
  @endif
  @if($modes)
    @foreach($modes as $mode)
      [data-theme='{{ $mode['name'] }}'] {
        {{ preg_replace('/\s+/', '', $mode['css']) }}
      }
    @endforeach
  @endif
</style>
