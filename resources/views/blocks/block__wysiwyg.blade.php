<x-section data-theme="{{ $config['block']['themes'] }}">
  <x-container>
    <div class="space-y-small max-w-prose mx-auto">
      <x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
      <x-display>{{ $content['headline'] }}</x-display>
      <div
        @class([
          'font-body',
          'text-body-1',
          'prose',
          'text-foreground',
          'leading-relaxed'
        ])
      >
        {!! $content['copy'] !!}
      </div>
    </div>
  </x-container>
</x-section>