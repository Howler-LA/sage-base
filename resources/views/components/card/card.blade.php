@props([
  'type'      => false,
  'count'     => 'color-card',
  'variant'   => 'color-card',
  'eyebrow'   => false,
  'headline'  => false,
  'subhead'   => false,
  'body'      => false,
  'links'     => false,
  'image'     => false,
  'featured'  => null,
  'list'      => false,
])

@php($class = match ($variant) {
  'news-card' 	=> 'rounded-card bg-news-card-background hover:bg-news-card-background-hover active:news-card-background-active',
  'color-card'  => 'rounded-card bg-background text-foreground',
  'image-card' 	=> 'rounded-card bg-background text-foreground',
  'news'        => 'bg-background text-foreground',
  'color'       => 'rounded-card bg-background text-foreground ring-foreground ring-1',
  'compare'     => 'rounded-card bg-background text-foreground ring-foreground ring-1',
  'image'       => 'rounded-card bg-background text-foreground',
  'person'      => 'rounded-card bg-background text-foreground',
})

<div {{ $attributes->twMerge([$class, 'card overflow-hidden', $featured ? 'grid lg:grid-cols-2 col-span-full' : 'flex flex-col', $variant]) }}>

  @if($variant == 'image' OR  $variant == 'person' OR $variant == 'image-card')
    @if($image)
      @image($image,'large',['class'=> $count == 1 || $featured ? 'h-auto xl:size-full object-cover' : 'w-full h-auto object-cover' ])
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
      
    ])
  >
    <x-eyebrow 
      :naked="$variant == 'news' ? true : false"
      :content="$eyebrow" 
    />
    <div class="space-y-min">
      <header class="flex flex-col">
        @if($featured)
          @set($headline_type,'subhead')
          @set($headline_size,'1')
          @set($body_size,'1')
        @else
          @if($variant == 'news')
            @set($headline_type,'body')
            @set($headline_size,'1')
            @set($body_size,'1')
          @elseif($variant == 'compare')
            @set($headline_type,'subhead')
            @set($headline_size,'1')
            @set($body_size,'1')
          @elseif($variant == 'person' || $variant == 'image')
            @set($headline_type,'title')
            @set($headline_size,'1')
            @set($body_size,'2')
          @else
            @set($headline_type,'title')
            @set($headline_size,'1')
            @set($body_size,'1')
          @endif
        @endif
        <x-dynamic-component 
          :component="$headline_type" 
          :size="$headline_size" 
          :message="$headline" 
          class="{{ $variant == 'news' ? 'font-bold' : null }}"
        />
        <x-body 
          :size="$body_size" 
          :message="$variant == 'person' ? $subhead : null" 
        />
      </header>
      <x-body :size="$body_size" :message="$body" />
      @if($list)
        <ul class="divide-y divide-border">
          @foreach($list as $item)
            <li class="flex gap-min py-em">
              <x-dynamic-component 
                class="size-6 flex-none"
                component="lucide-{{ $item['icon'] ? $item['icon'] : 'dot' }}" 
              />
              <x-body :message="$item['item']" />
            </li>
          @endforeach
        </ul>
      @endif
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