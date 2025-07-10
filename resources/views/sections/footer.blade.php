<x-section
  tag="footer" 
  padding="none"
  data-theme="{{ $footer['themes'] }}" 
>
  <x-container class="flex flex-col gap-med">
    <div class="font-medium text-pink-600 bg-pink-100">Eyebrow</div>
    <div class="font-medium text-pink-600 bg-pink-100">Headline</div>
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-small">
     {{--  @repeat(3)
        <div class="flex flex-col gap-1">
          <div class="border-b border-foreground pb-em">
            <x-eyebrow naked>About Us</x-eyebrow>
          </div>
          <ul class="divide-y divide-foreground border-t border-foreground">
            @repeat(3)
              <li class="py-min">
                <a href="" class="flex items-center justify-between">
                  <span>About Us</span>
                </a>
              </li>
            @endrepeat
          </ul>
        </div>
      @endrepeat --}}
      <x-footer
        class="grid grid-cols-3 gap-med col-span-3"
        name="footer_navigation" 
      />
      <div class="flex flex-col gap-em order-first">
        <x-eyebrow naked>About Us</x-eyebrow>
        <div class="border border-foreground rounded-card p-med">
          <div class="h-full flex flex-col items-center gap-min">
            <x-title message="Some headline" />
            <div class="w-px flex-grow bg-foreground"></div>
            <x-button 
              href="#" 
              label="Button Action" 
            />
          </div>
        </div>
      </div>
    </div>
    
    <div class="border-t border-foreground">
      <hr class="h-px border-foreground mt-1" />
      <div class="grid grid-cols-5 gap-small py-med">
        @repeat(4)
          <div 
            @class([
              'flex flex-col',
              'col-span-2 text-right' => $loop->last
            ])
          >
            <a href="#">USNH Privacy Policies</a>
            <a href="#">USNH Privacy Policies</a>
          </div>
        @endrepeat
      </div>
    </div>

  </x-container>
</x-section>