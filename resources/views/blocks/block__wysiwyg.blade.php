<x-section data-theme="{{ $config['block']['themes'] }}">
  <x-container>
    <div class="space-y-small mx-margins-large mx-auto">
      <x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
      <x-display>{{ $content['headline'] }}</x-display>
      <div
        @class([
          'font-body',
          'text-body-1',
          'prose max-w-none',
          'text-foreground',
          'leading-relaxed',
          'prose-p:text-body-1 prose-p:leading-body-1 prose-p:font-body',
          'prose-h1:text-super-display prose-h1:leading-super-display prose-h1:font-extrabold prose-h1:font-super-display prose-h1:tracking-[-4%]',
          'prose-h2:text-display-1 prose-h2:leading-display-1 prose-h2:font-extrabold prose-h2:font-display prose-h2:tracking-display',
          'prose-h3:text-subhead prose-h3:leading-subhead prose-h3:font-extrabold prose-h3:font-subhead prose-h3:tracking-subhead',
          'prose-h4:text-title-1 prose-h4:leading-title-1 prose-h4:font-extrabold prose-h4:font-title prose-h4:tracking-title',
          'prose-h5:text-title-2 prose-h5:leading-title-2 prose-h5:font-extrabold prose-h5:font-title prose-h5:tracking-title',
          'prose-h6:text-eyebrow prose-h6:leading-eyebrow prose-h6:font-[var(--font-weight-eyebrow)] prose-h6:font-eyebrow prose-h6:tracking-eyebrow prose-h6:uppercase',
          'prose-pre:text-meta-text prose-pre:leading-meta-text'
        ])
      >
        {!! $content['copy'] !!}
      </div>
    </div>
  </x-container>
</x-section>