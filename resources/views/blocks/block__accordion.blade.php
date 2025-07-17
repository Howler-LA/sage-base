@set($columns,$config['block']['columns'])

<x-section data-theme="{{ $config['block']['themes'] }}">
  <x-section.header>
    <x-eyebrow :content="$content['eyebrow']" />
    <x-display :message="$content['headline']" />
    <x-body :message="$content['copy']" />
  </x-section.header>
  <x-container 
    @class([
      'grid',
      'grid-cols-1 gap-lg',
      'xl:grid-cols-2 gap-y-sm' => $columns == 2,
      'xl:grid-cols-1 gap-y-sm' => $columns == 1,
    ])
  >
    <div 
      @class([
        'flex flex-col',
        'xl:px-x-large' => $columns == 1,
      ])
    >
      @if(get_sub_field('cards'))
        <x-accordion>
          @foreach(get_sub_field('cards') as $key => $item)
            <x-accordion.item
              title="{!! $item['headline'] !!}"
              key="0{{ $key+1 }}"
              copy="{!! $item['copy'] !!}"
            />
          @endrepeat
        </x-accordion>
      @endif
    </div>
  </x-container>
  @if($content['links'])
    <x-container>
      <x-card.footer>
        <x-button.group class="justify-center">
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
    </x-container>
  @endif
</x-section>