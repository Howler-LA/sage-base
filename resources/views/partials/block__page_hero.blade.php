<x-section x-data data-theme="{{ $config['block']['theme'] }}">
  <x-container class="relative grid grid-cols-1 xl:grid-cols-3 gap-xs sm:gap-md">
    <x-lockup
      class="xl:col-span-2"
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
    @if(get_sub_field('links'))
      <div class="flex flex-col gap-4">
        <x-eyebrow
          wrapper="false"
          content="Common Questions" 
        />
      <div>
        <x-divider class="col-span-2 xl:col-span-1" />
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-1 bg-foreground/50 pb-px gap-px">
          @foreach(get_sub_field('links')['links'] as $link)
            <a 
              href="{{ $link['link']['url'] }}"
              @click.prevent="
                const target = document.querySelector('{{ $link['link']['url'] }}');
                const offset = target.getBoundingClientRect().top + window.scrollY - {{ is_user_logged_in() ? 90+32 : 90 }};
                window.scrollTo({ top: offset, behavior: 'smooth' });
              "
              @class([
                'flex items-center justify-between py-link-grid-vert-padding group bg-background',
                'sm:odd:pr-3 sm:even:pl-3 sm:py-4',
                'xl:even:pl-0 xl:odd:pr-0'
              ])
            >
              <x-body size="2" content="{{ $link['link']['title'] }}" />
              <x-button.arrow />
            </a>
          @endforeach
        </div>
      </div>
    @endif
  </x-container>
</x-section>