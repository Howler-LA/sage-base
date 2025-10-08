<x-section
  tag="footer" 
  class="!pb-0"
  data-theme="{{ $footer['themes'] }}" 
>
  <x-container class="flex flex-col gap-med">

    <div class="flex flex-col lg:flex-row justify-between items-start gap-small">
      <div class="flex flex-col gap-em">
        <x-eyebrow :content="$footer['upper']['eyebrow']" />
        <x-eyebrow :content="$socials['headline']" />
        @if($socials['links'])
          <ul class="flex gap-min">
            @foreach($socials['links'] as $link)
              <li>
                <a 
                  aria-label="Links to {{ $link['name'] }}"
                  href="{{ $link['url'] }}"
                  @class([
                    'bg-background text-foreground',
                    'hover:bg-foreground hover:text-background',
                    'transition ease',
                    'border border-border size-14 flex items-center justify-center rounded-full group',
                  ])
                >
                  <x-dynamic-component
                    component="fab-{{ $link['name'] ? strtolower($link['name']) : 'facebook' }}" 
                    class="translate-y-px size-6 stroke-3 transition-transform duration-300 ease" 
                  />
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </div>
      <ul class="flex-grow hidden xl:flex flex-col items-end text-right">
        @if($footer['upper']['address'])
          <li class="flex gap-min"><x-body size="2" :message="$footer['upper']['address']" /></li>
        @endif
        @if($footer['upper']['phone'])
          <li class="flex gap-min"><x-body size="2" :message="$footer['upper']['phone']" /></li>
        @endif
        @if($footer['upper']['contact'])
          <li class="flex gap-min">
            <a class="underline underline-offset-4" href="{{ $footer['upper']['contact']['url'] }}">
              <x-body size="2" :message="$footer['upper']['contact']['title']" />
            </a>
          </li>
        @endif
      </ul>
    </div>

    <x-display 
      :message="$footer['upper']['headline']" 
      class="text-center xl:text-left" 
    />
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-small">
      <x-footer
        class="grid grid-cols-3 gap-med col-span-3"
        name="footer_navigation" 
      />
      <div class="flex flex-col gap-em lg:col-start-4">
        @if($footer['widget']['eyebrow'])
          <x-eyebrow naked :content="$footer['widget']['eyebrow']" />
        @else
          <div class="h-[13px]"></div>
        @endif
        <div class="border !border-[var(--gridlines-tint)] rounded-card p-med">
          <div class="h-full flex flex-col items-center gap-min">
            <x-title :message="$footer['widget']['headline']" />
            <div class="w-px min-h-large lg:min-h-em flex-grow bg-foreground"></div>
            <x-button 
              href="{{ $footer['widget']['link']['url'] }}" 
              label="{{ $footer['widget']['link']['title'] }}" 
              target="{{ $footer['widget']['link']['target'] }}" 
            />
          </div>
        </div>
      </div>
    </div>
    
    <div class="border-t border-border">
      <hr class="h-px border-[var(--gridlines-tint)] mt-1" />
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-min lg:gap-small py-med">
        <div class="xl:col-span-2 col-start-1">
          <x-lower-footer
            class="grid xl:grid-cols-3 gap-y-min xl:gap-y-0 gap-x-em col-span-3"
            name="lower_footer_navigation" 
          />
        </div>
        <div class="xl:col-span-2 xl:col-start-3 flex flex-col gap-y-min xl:gap-y-0 items-end xl:text-right">
          <x-body size="2">Copyright © {{ date("Y") }}, {{ $siteName }}. All rights reserved. </x-body>
          <x-body size="2">TTY Users: 7-1-1 or 800-735-2964</x-body>
        </div>
      </div>
    </div>

  </x-container>
</x-section>