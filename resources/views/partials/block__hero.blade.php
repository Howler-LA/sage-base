<x-section
  padding="3xl"
  data-theme="{{ $config['block']['theme'] }}"
>
  @if($content['image'])
    <div class="absolute inset-0 bg-black">
      <x-media 
        data-aos="fade-in"
        id="{{ $content['image'] }}" 
        class="opacity-75 w-full h-full object-cover" 
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
  </x-container>
</x-section>