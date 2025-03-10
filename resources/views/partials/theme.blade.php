{!! $font_embed !!}

<style id="brand-styles">
  :root {
    /*Fonts*/
    --eyebrow-font:       {!! $font['eyebrow'] !!};
    --headline-font:      {!! $font['headline'] !!};
    --body-font:          {!! $font['body'] !!};
    --button-font:        {!! $font['button'] !!};
    --key-font:           {!! $font['key'] !!};
    /*Brand Colors*/
    --brand-background:         {!! $variables ? $brand['background_tw'] : $brand['background'] !!};
    --brand-foreground:         {!! $variables ? $brand['foreground_tw'] : $brand['foreground'] !!};
    --brand-accent-background:  {!! $variables ? $brand['accent_bg_tw'] : $brand['accent_bg'] !!};
    --brand-accent-foreground:  {!! $variables ? $brand['accent_text_tw'] : $brand['accent_text'] !!};
  }
</style>