@set($columns,$config['block']['columns'])

<x-section data-theme="{{ $config['block']['theme'] }}">
  <x-container 
    @class([
      'grid',
      'grid-cols-1 gap-lg',
      'xl:grid-cols-2 gap-y-sm' => $columns == 2,
      'xl:grid-cols-1 gap-y-sm' => $columns == 1,
    ])
  >
    <x-lockup
      align="{{ $columns == 2 ? 'left' : 'center' }}"
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
    <div 
      @class([
        'flex flex-col',
        'xl:px-xl' => $columns == 1,
      ])
    >
      @if(get_sub_field('cards'))
        <x-accordion>
          @foreach(get_sub_field('cards') as $key => $item)
            <x-accordion.accordion-item
              title="{!! $item['headline'] !!}"
              key="0{{ $key+1 }}"
              copy="{!! $item['copy'] !!}"
            />
          @endrepeat
        </x-accordion>
      @endif
    </div>
  </x-container>
</x-section>