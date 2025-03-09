@set($testimonials,[
  '01' => [
    'copy'        => 'I had no idea i would come here and do hands-on research!',
    'headline'    => 'James Johnson',
    'subheadline' => 'Intern',
    'image'       => '91'
  ],
  '02' => [
    'copy'        => 'Wow, I had no idea i would come here and do hands-on research!',
    'headline'    => 'Gladis Johnson',
    'subheadline' => 'Designer',
    'image'       => '91'
  ],
  '03' => [
    'copy'        => 'Oh my, I had no idea i would come here and do hands-on research!',
    'headline'    => 'Magna Johnson',
    'subheadline' => 'Author',
    'image'       => '91'
  ]
])

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<x-section 
  data-theme="{{ $config['block']['theme'] }}" x-data="{
    init() {
      new Swiper(this.$refs.swiper, {
        loop: true,
        {{-- effect: 'fade', --}}
        crossFade: true,
        autoHeight: true,
        autoplay: {
          delay: 5000,
          disableOnInteraction: false,
        },
        speed: 500,
        navigation: {
          nextEl: '.slides-button-next',
          prevEl: '.slides-button-prev',
        },
        pagination: {
          el: '.slides-pagination',
        },
      }).mount()
    },
  }"
>
  <x-container>
    <div class="xl:px-xl flex flex-col">
      <x-lockup eyebrow="{!! $content['eyebrow'] !!}"/>
      
      <div x-ref="swiper" class="swiper w-full border" aria-label="Testimonial Carousel">
        <div class="swiper-wrapper">
          @foreach($testimonials as $content)
            <div class="swiper-slide bg-background max-h-[75dvh]">
              <div class="grid xl:grid-cols-2">
                <div class="p-xs xl:p-lg flex flex-col items-center justify-center gap-4 xl:gap-sm text-center">
                  <x-lucide-quote class="fill-foreground text-background" />
                  <p class="font-serif font-lighter leading-snug xl:leading-normal text-xl xl:text-4xl">{!! $content['copy'] !!}</p>
                  <div class="flex flex-col items-center">
                    <x-type.key title="{!! $content['headline'] !!}" />
                    <x-lucide-minus />
                    <x-type.key title="{!! $content['subheadline'] !!}" />
                  </div>
                  <x-button label="Get Involved" />
                </div>
                <div class="bg-black/10">
                  <x-media id="{!! $content['image'] !!}" class="w-full h-full object-cover" />
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="flex items-center justify-center gap-4 pt-4 xl:pt-xs">
        <button class="cursor-pointer slides-button-prev"><x-lucide-circle-arrow-left class="size-10 stroke-1" /></button>
        <div class="font-mono uppercase text-sm tracking-wider">02 of 12</div>
        <button class="cursor-pointer slides-button-next"><x-lucide-circle-arrow-right class="size-10 stroke-1" /></button>
      </div>
    </div>
  </x-container>
</x-section>