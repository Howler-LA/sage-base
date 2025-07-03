@props([
  'count'     => 'color-card',
  'variant'   => 'color-card',
  'eyebrow'   => false,
  'headline'  => false,
  'subhead'   => false,
  'body'      => false,
  'links'     => false,
  'image'     => false,
])

@php($class = match ($variant) {
  'news-card' 	=> 'rounded-card bg-news-card-background hover:bg-news-card-background-hover active:news-card-background-active',
  'color-card' 	=> 'rounded-card bg-color-card-background hover:bg-color-card-background-hover active:color-card-background-active',
  'image-card' 	=> 'rounded-card bg-color-card-background hover:bg-color-card-background-hover active:color-card-background-active',
  'news'        => '',
  'color'       => 'rounded-card bg-color-card-background hover:bg-color-card-background-hover active:color-card-background-active',
  'image'       => 'rounded-card bg-color-card-background hover:bg-color-card-background-hover active:color-card-background-active',
  'person'      => 'rounded-card bg-color-card-background hover:bg-color-card-background-hover active:color-card-background-active',
})

<div {{ $attributes->twMerge([$class,'overflow-hidden']) }}>

  @if($image)
    @image($image,'large',['class'=> $count == 1 ? 'h-auto xl:size-full object-cover' : 'w-full h-auto object-cover' ])
  @endif

  <x-card.content
    @class([
      $count == 1 ? 'p-large space-y-small' : '',  
      'p-zero' => $variant == 'news'
    ])
  >
    <x-eyebrow 
      :naked="$variant == 'news' ? true : false"
      :content="$eyebrow" 
    />
    <header class="flex flex-col">
      <x-dynamic-component 
        :component="$variant == 'person' || $variant == 'news' ? 'body' : 'subhead' " 
        :class="$variant == 'person' || $variant == 'news' ? 'font-bold' : '' " 
        :message="$headline" 
      />
      <x-body :message="$subhead" />
    </header>
    <x-body :message="$body" />
    @if($links)
      <x-card.footer>
        <x-button.group>
          @foreach($links as $link)
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
  </x-card.content>

</div>