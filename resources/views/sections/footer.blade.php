<x-section
  tag="footer" 
  class="!pb-0"
  data-theme="{{ $footer['themes'] }}" 
>
  <x-container class="flex flex-col gap-med">

    <div class="flex flex-col lg:flex-row justify-between items-start gap-small">
      <x-eyebrow>Simple footer headline</x-eyebrow>
      <ul>
        <li class="flex gap-min"><x-meta-text>01</x-meta-text><x-body size="2">1234 Address St<br>Los Angeles, CA 90065</x-body></li>
        <li class="flex gap-min"><x-meta-text>02</x-meta-text><x-body size="2">555-555-5555</x-body></li>
        <li class="flex gap-min"><x-meta-text>03</x-meta-text><x-body size="2">Contact us</x-body></li>
      </ul>
    </div>

    <x-display message="Simple footer headline " />
    
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-small">
      <x-footer
        class="grid grid-cols-3 gap-med col-span-3"
        name="footer_navigation" 
      />
      <div class="flex flex-col gap-em">
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
      <div class="grid grid-cols-1 lg:grid-cols-5 gap-min lg:gap-small py-med">
        @repeat(4)
          <div 
            @class([
              'flex flex-col gap-min',
              'lg:col-span-2 lg:text-right' => $loop->last
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