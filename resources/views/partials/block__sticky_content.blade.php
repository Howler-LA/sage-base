@set($columns,2)

<x-section data-theme="{{ $config['block']['theme'] }}">
  <x-container 
    @class([
      'grid',
      'grid-cols-1 gap-lg',
      'xl:grid-cols-2 gap-y-sm' => $columns == 2,
      'xl:grid-cols-1 gap-y-sm' => $columns == 1,
    ])
  >
    <div>
      <x-lockup
        align="{{ $columns == 2 ? 'left' : 'center' }}"
        @class([
          'xl:sticky',
          'xl:top-[calc(theme(spacing.lg)+calc(90px+32px))] xl:pb-lg' => $header['sticky'] == true && is_user_logged_in() == true,
          'xl:top-[calc(theme(spacing.lg)+calc(90px+0px))] xl:pb-lg' => $header['sticky'] == true && is_user_logged_in() == false,
          'xl:top-[calc(theme(spacing.lg)+calc(0px+32px))] xl:pb-lg' => $header['sticky'] == false && is_user_logged_in() == true,
          'xl:top-[calc(theme(spacing.lg)+calc(0px+0px))] xl:pb-lg' => $header['sticky'] == false && is_user_logged_in() == false,
          'xl:max-w-[calc(calc(var(--spacing-mega)*.5)-calc(var(--spacing-lg)*2))]'
        ])
        eyebrow="{!! $content['eyebrow'] !!}"
        headline="{!! $content['headline'] !!}"
        copy="{!! $content['copy'] !!}"
      />
    </div>
    @if(get_sub_field('cards'))
      <div 
        @class([
          'flex flex-col',
          'xl:px-xl' => $columns == 1,
        ])
      >
        @foreach(get_sub_field('cards') as $key => $card)
          <x-item variant="accordion-card">
            <x-item.content>
              <x-eyebrow wrapper="false" content="0{{ $loop->iteration }}" />
              <header class="space-y-em">
                <x-title size="1" content="{{ $card['headline'] }}" />
                <x-body size="{{ $columns >= 4 ? '2' : '1' }}" content="{!! $card['copy'] !!}" />
              </header>
              @if($card['links'])
                <x-button.group>
                  @foreach($card['links'] as $link)
                  asdfasd
                    <x-button
                      style="{{ $link['config']['style'] }}"
                      format="{{ $link['config']['format'] }}"
                      href="{{ $link['link']['url'] }}"
                      label="{{ $link['link']['title'] }}" 
                      target="{{ $link['link']['target'] }}"
                    />
                  @endforeach
                </x-button.group>
              @endif
            </x-item.content>
          </x-item>
          {{-- <x-card.image
            items="2"
            parent="{{  get_row_layout() }}"
            image="{!! $card['image'] !!}"
            eyebrow="0{{ $key }}"
            title="{!! $card['headline'] !!}"
            copy="{!! $card['copy'] !!}"
            links="{!! json_encode($card['links']) !!}"
          /> --}}
        @endforeach
      </div>
    @endif
  </x-container>
</x-section>
