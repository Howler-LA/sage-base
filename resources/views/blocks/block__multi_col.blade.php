<x-section data-theme="{{ $config['block']['themes'] }}">
  <x-section.header>
    <x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
    <x-display>{{ $content['headline'] }}</x-display>
    <x-body>{!! $content['copy'] !!}</x-body>
    @if($content['links'])
      <x-card.footer>
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
      </x-card.footer>
    @endif
  </x-section.header>
  <x-container>
    <div class="grid grid-cols-1 xl:grid-cols-3 gap-gutter">
      @layouts('cards')
        @if(file_exists(get_theme_file_path('resources/views/components/card/' . str_replace('card__', '', get_row_layout()) . '.blade.php')))
          <x-dynamic-component :component="str_replace('__', '.', get_row_layout())" />
        @else
          <div class="py-10 bg-black/10 text-black border-2 border-dashed border-current rounded-lg text-center text-sm font-medium">
            {{ get_row_layout() }}
          </div>
        @endif
      @endlayouts
    </div>
  </x-container>
</x-section>