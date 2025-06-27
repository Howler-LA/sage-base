<x-section data-theme="{{ $config['block']['themes'] }}" class="pb-0">
	<x-section.image />	
	<x-section.header class="relative">
		<x-eyebrow>{{ $content['eyebrow'] }}</x-eyebrow>
    <x-super-display>{{ $content['headline'] }}</x-super-display>
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
	</x-section.header>
	<x-container class="relative">
		@image($content['image'],'large',['class'=>'w-full h-auto block rounded-t-card', 'alt'=> $content['headline'] ])
	</x-container>
</x-section>


{{-- <x-section class="py-zero">
	<x-section class="pb-zero" data-theme="{{ $config['block']['theme'] }}">
		<x-container>
			<x-section.header>
				<x-eyebrow.wrapper>
					<x-eyebrow>{!! $content['eyebrow'] !!}</x-eyebrow>
				</x-eyebrow.wrapper>
				<x-super-display>{!! $content['headline'] !!}</x-super-display>
				@if($content['links'])
					<x-button.group>
						@foreach($content['links'] as $link)
							<x-button href="{!! $link['link']['url'] !!}">{!! $link['link']['title'] !!}</x-button>
						@endforeach
					</x-button.group>
				@endif
			</x-section.header>
			@image($content['image'],'full',['class'=>'object-cover rounded-t-card mt-large','alt' => $content['headline']])
		</x-container>
		<x-section class="py-zero" data-theme="Cyan">
			<x-container>
				<div data-theme="Black" class="p-large space-y-med rounded-b-card bg-background text-foreground">
					<x-section.header>
						<x-eyebrow.wrapper>
							<x-eyebrow>{!! get_sub_field('sub_content')['eyebrow'] !!}</x-eyebrow>
						</x-eyebrow.wrapper>
						<x-subhead>{!! get_sub_field('sub_content')['copy'] !!}</x-subhead>
						@if(get_sub_field('sub_content')['links'])
							<x-button.group>
								@foreach(get_sub_field('sub_content')['links'] as $link)
									<x-button href="{!! $link['link']['url'] !!}">{!! $link['link']['title'] !!}</x-button>
								@endforeach
							</x-button.group>
						@endif
					</x-section.header>
				</div>
			</x-container>
		</x-section>
	</x-section>
</x-section> --}}