<x-section 
  data-theme="{{ $config['block']['themes'] }}" 
  class="py-zero"
>
	<x-section.image class="object-fill" />	
	<x-section.header data-aos="fade-in" class="relative">
    <div 
      data-theme="{{ $config['block']['themes_secondary'] }}"  
      class="bg-background text-foreground flex flex-col items-center justify-center p-large rounded-b-card space-y-small"
    >
  		<x-eyebrow>{{ $content['headline'] }}</x-eyebrow>
      <x-subhead>{!! $content['copy'] !!}</x-subhead>
      @if($content['links'])
        <x-card.footer>
          <x-button.group>
            @foreach($content['links'] as $link)
              <x-button 
                variant="{{ $loop->iteration == 1 ? 'outline' : 'outline' }}"
                label="{{ $link['link']['title'] }}"
                title="{{ $link['link']['title'] }}"
                href="{{ $link['link']['url'] }}"
                target="{{ $link['link']['target'] }}"
              />
            @endforeach
          </x-button.group>
        </x-card.footer>
      </div>
    @endif
	</x-section.header>
</x-section>