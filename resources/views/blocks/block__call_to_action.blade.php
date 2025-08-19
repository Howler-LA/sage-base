<x-section padding="{{ $config['block']['inset'] ? null : 'roomy' }}" data-theme="{{ $config['block']['themes'] }}">
  <x-section.image data-aos="fade-in" />
  <x-container class="relative">
    <div 
      data-theme="{{ $config['block']['inset'] ? $config['block']['themes_card'] : null }}"
      data-aos="fade-in" 
      data-aos-delay="100"
      @class([
        'bg-background text-foreground rounded-card p-section' => $config['block']['inset'],
        'space-y-small flex flex-col',
        'items-center justify-center text-center' => $config['block']['align'] == 'center',
        'items-start justify-start text-left' => $config['block']['align'] == 'left',
        'items-end justify-end text-right' => $config['block']['align'] == 'right',
      ])
    >
      <x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
      <x-display>{{ $content['headline'] }}</x-display>
      <x-body 
        @class([
          'max-w-prose'
        ])
      >
        {!! $content['copy'] !!}
      </x-body>
      @if($content['links'])
        <x-button.group>
          @foreach($content['links'] as $link)
            <x-button 
              variant="{{ $loop->iteration == 1 ? 'primary' : 'outline' }}"
              label="{{ $link['link']['title'] }}"
              title="{{ $link['link']['title'] }}"
              href="{{ $link['link']['url'] }}"
              target="{{ $link['link']['target'] }}"
            />
          @endforeach
        </x-button.group>
      @endif
    </div>
  </x-container>
</x-section>