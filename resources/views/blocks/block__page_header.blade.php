<x-section data-theme="{{ $config['block']['themes'] }}">
  <x-container>
    <div class="space-y-small">
      <x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
      <x-super-display>{{ $content['headline'] }}</x-super-display>
      <x-body>{!! $content['copy'] !!}</x-body>
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