<div 
  data-theme="{{ $config['block']['theme'] }}"
  class="grid xl:grid-cols-2 bg-background text-foreground"
>
  <div 
    @class([
      'p-xs pb-0 sm:p-sm sm:pb-0 md:p-md md:pb-0 xl:p-lg',
      'flex flex-col',
      'items-end'
    ])
  >
    <x-lockup
      @class([
        'xl:sticky',
        'xl:top-56' => $header['sticky'],
        'xl:max-w-[calc(calc(var(--spacing-mega)*.5)-calc(var(--spacing-lg)*2))]'
      ])
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
  </div>
  <div 
    @class([
      'min-h-[calc(100vh-136px)]',
      'flex flex-col',
      'p-0'
    ])
  >
    @repeat(5)
      <div class="border-b bg-background p-xs sm:p-sm md:p-md xl:p-lg flex flex-col gap-4">
        <div class="aspect-video bg-black/10 rounded-lg"></div>
        <x-lockup
          key="0{{ $loop->iteration }}"
          title="Some title goes here"
          copy="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse quis elit vitae orci sagittis facilisis. Aenean egestas fermentum justo, lobortis consectetur nisi. Integer non semper ante. "
        />
      </div>
    @endrepeat
  </div>
</div>