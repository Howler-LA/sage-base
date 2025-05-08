<section data-theme="{{ $config['block']['theme'] }}" class="pt-lg bg-gradient-to-t from-[#02ADCB] to-white text-foreground">
	<x-container class="flex flex-col gap-[calc((var(--spacing-gutters))*1px)]">
		<x-lockup
			align="center"
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
    @if($content['links'])
      <div
        @class([
          'flex items-center justify-center gap-min'
        ])
      >
        @foreach($content['links'] as $key => $link)
          <x-button 
            href="{{ $link['link']['url'] }}"
            style="{{ $link['config']['style'] }}"
            format="{{ $link['config']['format'] }}"
            label="{{ $link['link']['title'] }}" 
            target="{{ $link['link']['target'] }}"
          />
        @endforeach
      </div>
    @endif
    @if($content['image'])
			@image($content['image'],'large',['class'=>'w-full h-auto rounded-t-card-radius'])
		@endif
	</x-container>
	<div class="bg-[#02ADCB] pb-lg">
		<x-container>
			<div class="aspect-[1280/577] bg-black rounded-b-card-radius"></div>
		</x-container>
	</div>
</section>