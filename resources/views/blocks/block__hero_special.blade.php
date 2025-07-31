@set($align, $config['block']['align'])
@set($scaling,$align == 'center' ? true : false)
@set($order,false)

@if($content['svg_headline'])
  @set($width,  wp_get_attachment_image_src($content['svg_headline'],'full')[1])
  @set($height, wp_get_attachment_image_src($content['svg_headline'],'full')[2])
@endif

<x-section
  :padding="$align == 'center' ? '' : 'none'"
  data-theme="{{ $config['block']['themes'] }}" 
  @class([
    'bg-background text-foreground',
    'overflow-hidden',
    'pb-0 overflow-hidden' => $content['image'],
  ])
>
  <x-container
    @class([
      'grid grid-cols-1 gap-med',
      'xl:gap-large' => $align == 'center' && !$content['svg_headline'],
      'grid xl:grid-cols-2 xl:gap-med' => $align != 'center'
    ])
  >
    <div class="z-10">
      <div
        @class([
          'flex flex-col justify-center h-full space-y-med',
          'items-center text-balance' => $align == 'center' && !$content['svg_headline']
        ])
      >
        <x-eyebrow :content="$content['eyebrow']" />
        <div class="space-y-em">
          <x-super-display 
            @class([
              'relative',
              'items-center justify-center text-center xl:px-large' => $config['block']['align'] == 'center',
              'items-start justify-start text-left' => $config['block']['align'] == 'left',
              'items-end justify-end text-right' => $config['block']['align'] == 'right',
              'sr-only' => $content['svg_headline']
            ])
            :message="$content['headline']"
          />
          <x-title 
            @class([
              'max-w-screen-md' => $content['svg_headline']
            ])
            :message="$content['subhead']" 
          />
        </div>
        <x-body 
          :message="$content['copy']" 
          @class([
            'max-w-prose mx-auto',
            'text-center' => $align == 'center'
          ])
        />
        @if($content['links'])
          <div class="flex flex-col pt-em card-footer justify-end">
            <x-button.group>
              @foreach($content['links'] as $link)
                <x-button 
                  variant="{{ $loop->iteration == 1 ? 'primary' : 'outline' }}"
                  label="{{ $link['link']['title'] }}"
                  title="{{ $link['link']['title'] }}"
                  href="{{ $link['link']['url'] }}"
                  target="{{ $link['link']['target'] }}"
                />
              @endforeach
            </x-button.group>
          </div>
        @endif
      </div>
    </div>
  </x-container>
  @if($content['svg_headline'])
    <div 
      id="svg"
      class="z-20 relative mb-0"
    >
      <div class="absolute inset-0">
        @image($content['svg_headline'],'large',['class'=>'w-full h-auto block'])
      </div>
    </div>
  @endif
  <x-container>
    <div class="">
      <div 
        @class([
          'xl:-mx-[12.5vw]' => $align != 'center'
        ])
      >
        @image($content['image'],'large',[
          'data-aos-delay' => '100', 
          'data-aos'=>'fade-in', 
          'class'=>'w-full h-auto block', 
          'alt'=> $content['headline'] 
        ])
      </div>
    </div>
  </x-container>
</x-section>

<style>
  #svg {
    aspect-ratio: {{ $width }}/{{ $height / 2 }};
  }
</style>

{{-- <x-section 
  data-theme="{{ $config['block']['themes'] }}" 
  padding="{{ $content['image'] ? '' : 'roomy' }}"
  @class([ 'pb-0 overflow-hidden' => $content['image'] ])
>
	<x-section.image class="object-fill" />	
	<x-section.header 
    data-aos="fade-in"
    @class([
      'relative',
      'items-center justify-center text-center' => $config['block']['align'] == 'center',
      'items-start justify-start text-left' => $config['block']['align'] == 'left',
      'items-end justify-end text-right' => $config['block']['align'] == 'right',
    ])
  >
		<x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
    <div class="flex flex-col gap-em">
      <x-super-display 
        @class([
          'relative',
          'items-center justify-center text-center xl:px-large' => $config['block']['align'] == 'center',
          'items-start justify-start text-left' => $config['block']['align'] == 'left',
          'items-end justify-end text-right' => $config['block']['align'] == 'right',
        ])
        :message="$content['headline']"
      />
      <x-subhead :message="$content['subhead']" />
    </div>
    <x-body :message="$content['copy']" />
    @if($content['links'])
      <x-card.footer>
        <x-button.group>
          @foreach($content['links'] as $link)
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
	</x-section.header>
  @if($content['image'])
  	<x-container class="relative">
  		@image($content['image'],'large',['data-aos-delay' => '100', 'data-aos'=>'fade-up', 'class'=>'w-full h-auto block rounded-t-card', 'alt'=> $content['headline'] ])
  	</x-container>
  @endif
</x-section> --}}