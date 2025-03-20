<style id="theme-variables">
  :root {
    /* Font Sizes */
    --font-size-super-display: 100;
    --font-size-display-1: 72;
    --font-size-subhead: 48;
    --font-size-title-1: 32;
    --font-size-title-2: 28;
    --font-size-eyebrow: 14;
    --font-size-body-1: 20;
    --font-size-body-2: 16;
    /* Font Sizes — Prose? */
    --font-size-small-text: 14;
    --font-size-meta-text: 14;
    --font-size-pullquote-xl: 64;
    --font-size-pullquote-lg: 48;
    --font-size-pullquote-sm: 32;
    --font-size-editorial-intro: 28;
    --font-size-editorial-body: 24;
    /* Line Height */
    --line-height-super-display-lh: 105;
    --line-height-display-1-lh: 72;
    --line-height-subhead-lh: 48;
    --line-height-title-1-lh: 32;
    --line-height-title-2-lh: 28;
    --line-height-eyebrow-lh: 18;
    --line-height-body-1-lh: 26;
    --line-height-body-2-lh: 21;
    /* Line Height — Prose? */
    --line-height-small-text-lh: 14;
    --line-height-meta-text-lh: 14;
    --line-height-pullquote-xl-lh: 64;
    --line-height-pullquote-lg-lh: 48;
    --line-height-pullquote-sm-lh: 32;
    --line-height-editorial-intro-lh: 28;
    --line-height-editorial-body-lh: 24;
  }
  @if($colors)
    :root {
      {!! $colors !!}
    }
  @endif
  @if($modes)
    @foreach($modes as $mode)
      [data-theme='{{ $mode['name'] }}'] {
        {{ $mode['css'] }}
      }
    @endforeach
  @endif
</style>