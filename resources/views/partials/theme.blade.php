{!! $font_embed !!}

<style id="brand-styles">
  :root {
    /*Fonts*/
    --eyebrow-font:             {!! $font['eyebrow'] !!};
    --headline-font:            {!! $font['headline'] !!};
    --body-font:                {!! $font['body'] !!};
    --button-font:              {!! $font['button'] !!};
    --key-font:                 {!! $font['key'] !!};

    --background:               white;
    --foreground:               black;
    --eyebrow-bg:               red;
    --eyebrow-text:             white;
    --btn-bg:                   blue;
    --btn-text:                 white;
  }

  @if(get_field('brand','option')['modes'])
    @foreach(get_field('brand','option')['modes'] as $mode)
      [data-theme="{{ strtolower($mode['name']) }}"] {
        --background:    {{ $mode['color_select_1'] }};
        --foreground:    {{ $mode['color_select_2'] }};
        --eyebrow-bg:    {{ $mode['color_select_3'] }};
        --eyebrow-text:  {{ $mode['color_select_4'] }};
        --btn-bg:        {{ $mode['color_select_5'] }};
        --btn-text:      {{ $mode['color_select_6'] }};
      }
    @endforeach
  @endif

</style>

@php
  /*Brand Colors*/
  // --brand-background:         {!! $variables ? 'var(--color-' . $brand['background_tw'] . ')' : $brand['background'] !!};
  // --brand-subtle-background:  {!! $variables ? 'var(--color-' . $brand['background_subtle_tw'] . ')' : $brand['background_subtle'] !!};
  // --brand-foreground:         {!! $variables ? 'var(--color-' . $brand['foreground_tw'] . ')' : $brand['foreground'] !!};
  // --brand-accent-background:  {!! $variables ? 'var(--color-' . $brand['accent_bg_tw'] . ')' : $brand['accent_bg'] !!};
  // --brand-accent-foreground:  {!! $variables ? 'var(--color-' . $brand['accent_text_tw'] . ')' : $brand['accent_text'] !!};
@endphp