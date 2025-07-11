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
  class="relative"
  data-theme="{{ $config['block']['theme'] }}"
  x-data="{
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
          type: 'custom',
          renderCustom: function (swiper, current, total) {
            return '0' + current + ' of 0' + (total); 
          }
        },
      }).mount()
    },
  }"
>
  <x-container class="relative">
    <div class="xl:px-xl flex flex-col">
      <x-lockup eyebrow="{!! $content['eyebrow'] !!}"/>
      
      @if(get_sub_field('cards'))
        <div x-ref="swiper" class="swiper w-full border rounded-card-radius" aria-label="Testimonial Carousel">
          <div class="swiper-wrapper">
            @foreach(get_sub_field('cards') as $content)
              <div class="swiper-slide bg-background max-h-[75dvh]">
                <div class="grid grid-cols-1 xl:grid-cols-2">
                  <div class="p-sm xl:p-lg flex flex-col items-center justify-center gap-em xl:gap-sm text-center">
                    <x-lucide-quote class="fill-foreground text-background" />
                    <x-pull-quote>{!! $content['copy'] !!}</x-pull-quote>
                    <div class="flex flex-col items-center">
                      <x-meta-text>{!! $content['headline'] !!}</x-meta-text>
                      <x-lucide-minus class="rotate-90" />
                      <x-meta-text>{!! $content['subheadline'] !!}</x-meta-text>
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
      @endif

      <div class="flex items-center justify-center gap-4 pt-4 xl:pt-xs">
        <button class="cursor-pointer slides-button-prev"><x-lucide-circle-arrow-left class="size-10 stroke-1" /></button>
        <div class="font-mono uppercase text-sm tracking-wider"><div class="slides-pagination"></div></div>
        <button class="cursor-pointer slides-button-next"><x-lucide-circle-arrow-right class="size-10 stroke-1" /></button>
      </div>
    </div>
  </x-container>
</x-section>