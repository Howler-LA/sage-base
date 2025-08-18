@php
	if($content['svg_headline']){
		$width  = wp_get_attachment_image_src($content['svg_headline'],'full')[1];
		$height = wp_get_attachment_image_src($content['svg_headline'],'full')[2];
	}
@endphp

<x-section 
	data-theme="{{ $config['block']['themes'] }}"
	class="pb-0 relative overflow-hidden"
>
	<x-section.image />
	<x-container
		@class([
			'relative flex flex-col',
			$content['svg_headline'] ? 'items-start text-left' : 'items-center text-center',
		])
	>
		<x-eyebrow :content="$content['eyebrow']" />
		<div class="space-y-em mt-med">
      <x-super-display 
        @class([
          'sr-only' => $content['svg_headline']
        ])
        :message="$content['headline']"
      />
      <x-title 
      	:message="$content['subhead']" 
      	@class([
					'max-w-screen-md',
					$content['svg_headline'] ? null : 'mx-auto',
				])
      />
    </div>
	</x-container>
	@if($content['svg_headline'])
		<div
			@class([
				'relative z-10',
				'mb-0'
			])
			@style([
				'aspect-ratio: '.$width.'/'.($height*.5).''
			])
		>
			<div class="absolute inset-0">
				@image($content['svg_headline'],'large',['class'=>'w-full h-auto block'])
			</div>
		</div>
	@endif
	<x-container>
		<div class="relative">
			@image($content['image'],'large',[
	      'data-aos-delay' => '100', 
	      'data-aos'=>'fade-in', 
	      'class'=>'w-full h-auto block', 
	      'alt'=> $content['headline'] ? $content['headline'] : 'Image'
	    ])
	   </div>
	</x-container>
</x-section>