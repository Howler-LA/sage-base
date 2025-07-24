<x-section
  tag="footer" 
  class="!pb-0"
  data-theme="{{ $footer['themes'] }}" 
>
  <x-container class="flex flex-col gap-med">

    <div class="flex flex-col lg:flex-row justify-between items-start gap-small">
      <x-eyebrow :content="$footer['upper']['eyebrow']" />
      <ul>
        @if($footer['upper']['address'])
          <li class="flex gap-min"><x-body size="2" :message="$footer['upper']['address']" /></li>
        @endif
        @if($footer['upper']['phone'])
          <li class="flex gap-min"><x-body size="2" :message="$footer['upper']['phone']" /></li>
        @endif
        @if($footer['upper']['contact'])
          <li class="flex gap-min"><x-body size="2" :message="$footer['upper']['contact']['title']" /></li>
        @endif
      </ul>
    </div>

    <x-display :message="$footer['upper']['headline']" />
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-small">
      <x-footer
        class="grid grid-cols-3 gap-med col-span-3"
        name="footer_navigation" 
      />
      <div class="flex flex-col gap-em lg:col-start-4">
        <x-eyebrow naked :content="$footer['widget']['eyebrow']" />
        <div class="border border-foreground rounded-card p-med">
          <div class="h-full flex flex-col items-center gap-min">
            <x-title :message="$footer['widget']['headline']" />
            <div class="w-px flex-grow bg-foreground"></div>
            <x-button 
              href="{{ $footer['widget']['link']['url'] }}" 
              label="{{ $footer['widget']['link']['title'] }}" 
              target="{{ $footer['widget']['link']['target'] }}" 
            />
          </div>
        </div>
      </div>
    </div>
    
    <div class="border-t border-foreground">
      <hr class="h-px border-foreground mt-1" />
      <div class="grid grid-cols-1 lg:grid-cols-4 gap-min lg:gap-small py-med">
        <div class="col-span-2 col-start-1">
          <x-lower-footer
            class="grid grid-cols-3 gap-x-em col-span-3"
            name="lower_footer_navigation" 
          />
        </div>
        <div class="col-span-2 col-start-3 flex flex-col items-end">
          <x-body size="2">Copyright © {{ date("Y") }}, {{ $siteName }}. All rights reserved. </x-body>
          <x-body size="2">TTY Users: 7-1-1 or 800-735-2964</x-body>
        </div>
      </div>
    </div>

  </x-container>
</x-section>