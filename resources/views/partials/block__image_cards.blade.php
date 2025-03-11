@set($columns,1)
@set($items,6)

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
        'grid gap-sm grid-cols-1',
        'xl:grid-cols-2' => $items == 2,
        'xl:grid-cols-3' => $items >= 3,
      ])
    >
      @repeat($items)
        <x-card.image_text
          variant="padded"
          data-theme="{{ $config['cards']['theme'] }}"
          items="{{ $items }}"
          image="91"
          eyebrow="Category"
          subhead="Card Title"
          copy="Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat."
        />
      @endrepeat
    </div>
  </x-container>
</x-section>