<style id="sizing">
  @if(get_field('sizes','option')['breakpoints'])
    @foreach(get_field('sizes','option')['breakpoints'] as $breakpoint)
      @media (width >= {{ $breakpoint['breakpoint'] }}px) {
        :root {
          {{ preg_replace('/\s+/', '', $breakpoint['variables']) }}
          {{ preg_replace('/\s+/', '', $breakpoint['type_sizes']) }}
        }
      }
    @endforeach
  @endif
</style>
