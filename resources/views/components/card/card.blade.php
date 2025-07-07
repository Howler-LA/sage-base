@props([
  'count'     => 'color-card',
  'variant'   => 'color-card',
  'eyebrow'   => false,
  'headline'  => false,
  'subhead'   => false,
  'body'      => false,
  'links'     => false,
  'image'     => false,
  'featured'  => null,
])

@php($class = match ($variant) {
  'news-card' 	=> 'rounded-card bg-news-card-background hover:bg-news-card-background-hover active:news-card-background-active',
  'color-card'  => 'rounded-card bg-background text-foreground',
  'image-card' 	=> 'rounded-card bg-background text-foreground',
  'news'        =>  null,
  'color'       => 'rounded-card bg-background text-foreground ring-foreground ring-1',
  'image'       => 'rounded-card bg-background text-foreground',
  'person'      => 'rounded-card bg-background text-foreground',
})

<div {{ $attributes->twMerge([$class,'overflow-hidden grid grid-cols-1', $featured ? 'lg:grid-cols-2 col-span-full' : null, $variant]) }}>

  @if($variant == 'image' OR  $variant == 'person' OR $variant == 'image-card')
    @if($image)
      @image($image,'large',['class'=> $count == 1 ? 'h-auto xl:size-full object-cover' : 'w-full h-auto object-cover' ])
    @else
      <div class="aspect-[5/4] bg-black/20 relative">
        <div class="absolute inset-0 flex items-center justify-center">
          <x-lucide-image-off class="size-24 stroke-1" />
        </div>
      </div>
    @endif
  @endif

  <x-card.content
    @class([
      $count == 1 ? 'p-large space-y-small' : '',  
      'p-zero' => $variant == 'news',
      'p-card lg:p-large xl:order-first' => $featured,
      $featured ? 'justify-between' : null,
    ])
  >
    <x-eyebrow 
      :naked="$variant == 'news' ? true : false"
      :content="$eyebrow" 
    />
    <div class="space-y-small">
      <header class="flex flex-col">
        <x-dynamic-component 
          :component="$featured ? 'subhead' : ($variant == 'person' || $variant == 'news' ? 'body' : 'title') " 
          :class="$variant == 'person' || $variant == 'news' ? 'font-bold' : '' " 
          :message="$headline" 
        />
        <x-body :message="$variant == 'person' ? $subhead : null" />
      </header>
      <x-body :message="$body" />
    </div>
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