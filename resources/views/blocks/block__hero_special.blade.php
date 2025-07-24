@set($align, $config['block']['align'])
@set($scaling,false)
@set($order,false)

<x-section data-theme="{{ $config['block']['themes'] }}" class="overflow-hidden" padding="{{ $scaling ? '' : 'none' }}">
  <x-cols 
    cols="3" 
    :contained="$scaling" 
    center
    :reversed="$align == 'right'"
  >
    <x-cols.col 
      class="z-20" 
      :contained="!$scaling" 
      data-aos="fade-in"
    >
      <div 
        @class([
          'space-y-small',
          'py-section' => $scaling,
          '-mr-x-large' => $align == 'left',
          '-ml-x-large' => $align == 'right',
        ])
      >
        <x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
        <x-super-display>{{ $content['headline'] }}</x-super-display>
        <x-subhead :message="$content['subhead']" />
        <x-body>{!! $content['copy'] !!}</x-body>
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
    </x-cols.col>
    <x-cols.col
      @class([
        'lg:col-span-2',
      ])
    >
      @if($content['image'])
        <div
          data-aos-delay="100" 
          data-aos="fade-up"
        >
          @image($content['image'],'large',['class'=>'w-full h-auto object-cover object-top'])
        </div>
      @else
        <div class="aspect-[5/4] bg-background rounded-card bg-black/10">
          <div class="absolute inset-0 flex items-center justify-center">
            <x-lucide-image-off class="size-24 stroke-1" />
          </div>
        </div>
      @endif
    </x-cols.col>
  </x-cols>
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