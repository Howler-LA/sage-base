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
  'color-card'  => 'rounded-card bg-background text-foreground',
  'image-card' 	=> 'rounded-card bg-background text-foreground',
  'news'        =>  null,
  'color'       => 'rounded-card bg-background text-foreground border-border border',
  'image'       => 'rounded-card bg-background text-foreground',
  'person'      => 'rounded-card bg-background text-foreground',
})

<div {{ $attributes->twMerge([$class,'overflow-hidden', $variant]) }}>

  @if($image && ( $variant == 'image' OR  $variant == 'person' OR $variant == 'image-card'))
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
      <x-body :message="$variant == 'person' ? $subhead : null" />
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