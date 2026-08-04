@php

  ## This is a test.

  $popup = get_field('popup', 'option');
  $popupWidth = is_array($popup) ? ($popup['modal_width'] ?? 'medium') : 'medium';
  $popupImage = is_array($popup) ? ($popup['image'] ?? null) : null;
  $popupContent = is_array($popup) ? trim((string) ($popup['content'] ?? '')) : '';
  $popupCta = is_array($popup) ? ($popup['cta'] ?? null) : null;
  $popupCtaAlignment = is_array($popup) ? ($popup['cta_alignment'] ?? 'center') : 'center';
  $popupTheme = is_array($popup) ? ($popup['themes'] ?? '') : '';
  $popupEnabled = is_front_page() && is_array($popup) && !empty($popup['enable']) && $popupImage;
  $popupHasPanel = $popupContent !== '' || !empty($popupCta);

  if (!in_array($popupCtaAlignment, ['left', 'center', 'right'], true)) {
    $popupCtaAlignment = 'center';
  }

  if (!in_array($popupWidth, ['small', 'medium', 'large'], true)) {
    $popupWidth = 'medium';
  }
@endphp

@if($popupEnabled)
  <div
    x-data="{ open: false }"
    x-init="$nextTick(() => open = true)"
    x-show="open"
    x-cloak
    x-trap.inert.noscroll="open"
    x-transition.opacity.duration.200ms
    @keydown.escape.window="open = false"
    @click.self="open = false"
    class="fixed inset-0 z-[100] overflow-y-auto bg-slate-950/75 px-4 py-8 sm:px-8 sm:py-12"
  >
    <div class="flex min-h-full items-center justify-center pointer-events-none">
      <section
        x-show="open"
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="opacity-0 translate-y-4 scale-[0.98]"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition duration-200 ease-in"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-2 scale-[0.99]"
        role="dialog"
        aria-modal="true"
        aria-label="{{ __('Site announcement', 'sage') }}"
        @class([
          'pointer-events-auto relative w-full overflow-hidden rounded-card bg-background text-foreground shadow-2xl',
          'max-w-2xl' => $popupWidth === 'small',
          'max-w-4xl' => $popupWidth === 'medium',
          'max-w-6xl' => $popupWidth === 'large',
        ])
      >
        <button
          type="button"
          @click="open = false"
          class="absolute right-3 top-3 z-10 inline-flex size-11 items-center justify-center rounded-full bg-slate-950/80 text-slate-50 ring-1 ring-slate-50/40 transition-colors duration-200 hover:bg-slate-950 focus-visible:outline-none focus-visible:ring-4 focus-visible:ring-slate-50/70"
          aria-label="{{ __('Close announcement', 'sage') }}"
        >
          <x-lucide-x aria-hidden="true" class="size-6" />
        </button>

        @image($popupImage, 'large', [
          'class' => 'block h-auto w-full',
          'loading' => 'eager'
        ])

        @if($popupHasPanel)
          <div
            data-theme="{{ $popupTheme }}"
            class="space-y-small bg-background p-small text-foreground sm:p-med"
          >
            @if($popupContent !== '')
              <div @class([
                'prose sm:prose-lg max-w-full leading-normal sm:leading-normal',
                'prose-invert' => in_array(strtolower((string) $popupTheme), ['black', 'blue'], true),
              ])>
                {!! do_shortcode($popupContent) !!}
              </div>
            @endif

            @if($popupCta)
              <div @class([
                'flex',
                'justify-start' => $popupCtaAlignment === 'left',
                'justify-center' => $popupCtaAlignment === 'center',
                'justify-end' => $popupCtaAlignment === 'right',
              ])>
                <x-button
                  href="{{ $popupCta['url'] }}"
                  target="{{ $popupCta['target'] ?: '_self' }}"
                  rel="{{ ($popupCta['target'] ?? '') === '_blank' ? 'noopener noreferrer' : null }}"
                  label="{{ $popupCta['title'] ?: __('Learn more', 'sage') }}"
                />
              </div>
            @endif
          </div>
        @endif
      </section>
    </div>
  </div>
@endif
