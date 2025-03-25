<x-section 
  class="relative"
  padding="xl"
  data-theme="{{ $config['block']['theme'] }}"
>
  @if($content['image'])
    <div class="absolute inset-0 bg-black">
      <x-media 
        data-aos="fade-in"
        id="{{ $content['image'] }}" 
        class="opacity-50 w-full h-full object-cover" 
      />
    </div>
  @endif
  <x-container class="relative">
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