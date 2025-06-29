<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<x-section 
  data-theme="{{ $config['block']['themes'] }}"
  x-data="{
    init() {
      new Swiper(this.$refs.swiper, {
        loop: true,
        effect: 'fade',
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
  <x-container>
    <div class="xl:p-section space-y-em">
      <x-eyebrow>{{ $content['headline'] }}</x-eyebrow>
      <div x-ref="swiper" class="swiper w-full rounded-card" aria-label="Testimonial Carousel">
        <div class="swiper-wrapper">
          @layouts('cards')
            @layout('card__testimonial')
              <div class="swiper-slide">
                <div data-theme="Black" class="grid grid-cols-1 xl:grid-cols-2">
                  <div class="p-large bg-background text-foreground">
                    <div class="size-full flex flex-col items-center justify-center text-center space-y-med">
                      <div class="space-y-zero">
                        <x-pull-quote message="“" />
                        <x-pull-quote message="{{ get_sub_field('content')['copy'] }}" />
                      </div>
                      <div class="space-y-min flex flex-col items-center justify-center">
                        <x-meta-text message="{{ get_sub_field('content')['name'] }}" />
                        <x-lucide-minus class="rotate-90" />
                        <x-meta-text message="{{ get_sub_field('content')['role'] }}" />
                      </div>
                      @if(get_sub_field('content')['link'])
                        <x-button
                          label="{{ get_sub_field('content')['link']['title'] }}"
                          href="{{ get_sub_field('content')['link']['url'] }}"
                          target="{{ get_sub_field('content')['link']['target'] }}"
                        />
                      @endif
                    </div>
                  </div>
                  @image(get_sub_field('content')['image'],'large',['class'=>'size-full object-cover'])
                </div>
              </div>
            @endlayout
          @endlayouts
        </div>
      </div>
      <div class="flex items-center justify-center gap-em text-black">
        <button class="size-8 flex items-center justify-center ring-2 ring-black rounded-full bg-white cursor-pointer slides-button-prev"><x-lucide-arrow-left class="size-6 stroke-2" /></button>
        <div class="font-mono uppercase text-sm tracking-wider"><div class="slides-pagination"></div></div>
        <button class="size-8 flex items-center justify-center ring-2 ring-black rounded-full bg-white cursor-pointer slides-button-next"><x-lucide-arrow-right class="size-6 stroke-2" /></button>
      </div>
    </div>
  </x-container>
</x-section>