<x-section data-theme="{{ $config['block']['themes'] }}" class="pb-0 overflow-hidden">
	<x-section.image class="object-fill" />	
	<x-section.header data-aos="fade-in" class="relative">
		<x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
    <x-super-display class="xl:px-large">{{ $content['headline'] }}</x-super-display>
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
	<x-container class="relative">
		@image($content['image'],'large',['data-aos-delay' => '100', 'data-aos'=>'fade-up', 'class'=>'w-full h-auto block rounded-t-card', 'alt'=> $content['headline'] ])
	</x-container>
</x-section>