{!! $font_embed !!}

<style id="brand-styles">
  :root {
    /*Fonts*/
    --eyebrow-font:             {!! $font['eyebrow'] !!};
    --headline-font:            {!! $font['headline'] !!};
    --body-font:                {!! $font['body'] !!};
    --button-font:              {!! $font['button'] !!};
    --key-font:                 {!! $font['key'] !!};
    /*Brand Colors*/
    --brand-background:         {!! $variables ? 'var(--color-' . $brand['background_tw'] . ')' : $brand['background'] !!};
    --brand-subtle-background:  {!! $variables ? 'var(--color-' . $brand['background_subtle_tw'] . ')' : $brand['background_subtle'] !!};
    --brand-foreground:         {!! $variables ? 'var(--color-' . $brand['foreground_tw'] . ')' : $brand['foreground'] !!};
    --brand-accent-background:  {!! $variables ? 'var(--color-' . $brand['accent_bg_tw'] . ')' : $brand['accent_bg'] !!};
    --brand-accent-foreground:  {!! $variables ? 'var(--color-' . $brand['accent_text_tw'] . ')' : $brand['accent_text'] !!};
  }
</style>