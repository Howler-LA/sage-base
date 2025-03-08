@set($width,'wide')
@set($order,'last')

<div class="grid xl:grid-cols-2">
  <div 
    data-theme="{{ $config['block']['theme'] }}" 
    @class([
      'bg-background text-foreground flex flex-col justify-center',
      'p-xs pb-0 sm:p-sm sm:pb-0 md:p-md md:pb-0 xl:p-lg',
      'flex',
      'items-end' => $order == 'last',
    ])
  >
    <x-lockup
      @class([
        'xl:max-w-[calc(calc(var(--spacing-mega)*.5)-calc(var(--spacing-lg)*2))]'
      ])
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
  </div>
  <div 
    data-theme="{{ $config['block']['theme'] }}" 
    @class([
      'xl:min-h-[calc(100vh-136px)]',
      'bg-background flex flex-col justify-center relative',
      'p-0' => $width == 'full',
      'p-sm sm:p-md md:p-lg xl:p-xl' => $width == 'narrow',
      'p-xs sm:p-sm md:p-md xl:p-lg' => $width == 'wide',
      'xl:order-first' => $order == 'first'
    ])
  >
    <x-image 
      id="{!! $content['image'] !!}"
      @class([
        'rounded-lg',
        'w-full h-auto object-cover',
        'absolute inset-0' => $width == 'full',
      ])
    />
  </div>
</div>