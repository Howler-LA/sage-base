<x-section 
	data-theme="{{ $config['block']['theme'] }}" 
	padding="xl"
	@class([
		'relative',
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
        	'pt-sm',
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
</x-section>