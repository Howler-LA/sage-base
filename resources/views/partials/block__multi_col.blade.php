@set($columns,1)

@php
  // Here we're counting the number of features, then subtracting from the total number of cards. 
  // This will allow us to span the features across all columns.
  $count = 0;
  if(get_sub_field('cards')){
    foreach(get_sub_field('cards') as $feature){
      if($feature['featured']){
        $count++;
      }
    }
    $items = count(get_sub_field('cards'))-$count;
  }
@endphp

<x-section data-theme="{{ $config['block']['theme'] }}">
  <x-container 
    @class([
      'space-y-sm',
    ])
  >
    <x-lockup
      align="{{ $columns == 2 ? 'left' : 'center' }}"
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
    @if(get_sub_field('cards'))
      <div 
        @class([
          'grid gap-sm grid-cols-1',
          'xl:grid-cols-2' => $items == 2,
          'xl:grid-cols-3' => $items == 3,
          'xl:grid-cols-2 xl:grid-cols-4' => $items >= 4,
        ])
      >
        @foreach(get_sub_field('cards') as $key => $card)
          <x-item variant="color-card">
            @image($card['image'],'large',['class'=>'w-full h-auto'])
            <div
              @class([
                'flex flex-col items-start gap-em',
                'py-card-padding' => $card['image']
              ])
            >
              <x-eyebrow wrapper="false" content="{!! $card['eyebrow'] !!}" />
              <x-body class="font-bold" size="1" content="{!! $card['headline'] !!}" />
              <x-body size="1" content="{!! $card['copy'] !!}" />
            </div>
          </x-item>
        @endforeach
      </div>
    @endif
  </x-container>
</x-section>
