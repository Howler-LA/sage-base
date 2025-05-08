<x-section 
	data-theme="{{ $config['block']['theme'] }}" 
	padding="xl"
	@class([
		'relative',
		'pb-0'
	])
>
	<x-container>
		<x-lockup
      align="center"
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
    @if($content['links'])
      <div
        @class([
        	'py-sm',
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
	</x-container>
	<x-container class="w-full">
		@if($content['image'])
			@image($content['image'],'large',['class'=>'w-full h-auto'])
		@endif
	</x-container>
</x-section>