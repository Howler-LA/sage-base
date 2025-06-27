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
    <x-columns columns="3">
      @layouts('cards')
        @layout('card')
          <x-card variant="color-card">
            @image($content['image'],'large',['class'=>'aspect-[405/350] relative object-cover'])
            <x-card.content>
              <x-body size="1" class="font-bold">{!! $content['headline'] !!}</x-body>
              <x-body size="2">{!! $content['copy'] !!}</x-body>
            </x-card.content>
          </x-card>
        @endlayout
      @endlayouts
    </x-columns>
  </x-container>
</x-section>