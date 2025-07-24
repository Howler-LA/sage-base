@set($align, $config['block']['align'])
@set($scaling,$align == 'center' ? true : false)
@set($order,false)

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
      'xl:gap-large' => $align == 'center',
      'grid xl:grid-cols-2 xl:gap-med' => $align != 'center'
    ])
  >
    <div class="z-10">
      <div
        @class([
          'flex flex-col justify-center h-full space-y-med',
          'items-center text-balance' => $align == 'center'
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
            ])
            :message="$content['headline']"
          />
          <x-title 
            :message="$content['subhead']" 
          />
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
      </div>
    </div>
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