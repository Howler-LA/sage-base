@php
  $brand_field = get_field('brand','options');
  $font_config = is_array($brand_field) && isset($brand_field['font']) ? $brand_field['font'] : null;
@endphp

@if($font_config && is_array($font_config))
  @if(isset($font_config['embed']))
    {!! $font_config['embed'] !!}
  @endif

  <style id="font-styles">
    :root {
      --eyebrow-font:       {!! $font_config['eyebrow'] ?? 'inherit' !!};
      --super-display-font: {!! $font_config['display'] ?? 'inherit' !!};
      --display-font:       {!! $font_config['display'] ?? 'inherit' !!};
      --title-font:         {!! $font_config['title'] ?? 'inherit' !!};
      --subhead-font:       {!! $font_config['subhead'] ?? 'inherit' !!};
      --body-font:          {!! $font_config['body'] ?? 'inherit' !!};
      --pull-quote-font:    {!! $font_config['pull_quote'] ?? 'inherit' !!};
      --pull-meta-text:     {!! $font_config['meta_text'] ?? 'inherit' !!};
      --button-font:        {!! $font_config['button'] ?? 'inherit' !!};
    }
  </style>
@endif