<x-section 
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
</x-section>