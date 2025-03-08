@set($columns,$config['block']['columns'])

<x-section data-theme="{{ $config['block']['theme'] }}">
  <x-container 
    @class([
      'grid',
      'grid-cols-1 gap-x-sm sm:gap-x-md',
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
      <x-accordion>
        @repeat(5)
          <x-accordion.accordion-item
            title="Hello there"
            key="0{{ $loop->iteration }}"
            copy="What's the word bb"
          />
        @endrepeat
      </x-accordion>
    </div>
  </x-container>
</x-section>