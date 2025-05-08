<section data-theme="{{ $config['block']['theme'] }}" class="pt-lg bg-gradient-to-br from-[#6A4B9F] via-[#02ADCB] to-white text-foreground">
	<x-container>
		<div class="flex flex-col gap-[calc((var(--spacing-gutters))*1px)] max-w-screen-md items-start">
			@if($content['eyebrow'])
		    <x-eyebrow content="{!! $content['eyebrow'] !!}" />
		  @endif
		  @if($content['copy'])
	      <x-body content="{!! $content['copy'] !!}" />
	    @endif
		</div>
		@if($content['headline'])
    	<div class="flex items-center justify-center relative z-20 translate-y-2/5">
      	<div class="inline-block text-[12.5vw] whitespace-nowrap font-extrabold tracking-tighter leading-none">
      		{!! $content['headline'] !!}
      	</div>
      </div>
    @endif
    @if($content['image'])
			@image($content['image'],'large',['class'=>'w-full h-auto rounded-t-card-radius'])
		@endif
	</x-container>
	<div class="bg-white pb-lg">
		<x-container>
			<div class="aspect-[1280/577] bg-black rounded-b-card-radius"></div>
		</x-container>
	</div>
</section>