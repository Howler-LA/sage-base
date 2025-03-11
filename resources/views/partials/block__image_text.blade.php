@set($width,'full')
@set($order,'last')

<section class="grid xl:grid-cols-2">
  <div 
    data-theme="{{ $config['block']['theme'] }}" 
    @class([
      'bg-background text-foreground flex flex-col justify-center',
      'p-xs sm:p-sm sm:pb-0 md:p-md md:pb-0 xl:p-lg',
      'xl:items-end' => $order == 'last',
    ])
  >
    <x-lockup
      @class([
        'xl:w-full xl:max-w-[calc(calc(var(--spacing-mega)*.5)-calc(var(--spacing-lg)*2))]'
      ])
      eyebrow="{!! $content['eyebrow'] !!}"
      headline="{!! $content['headline'] !!}"
      copy="{!! $content['copy'] !!}"
    />
  </div>
  <div 
    data-theme="{{ $config['media']['theme'] }}" 
    @class([
      'xl:min-h-[calc(100vh-136px)]' => $config['block']['height'],
      'min-h-[calc(60vh-136px)]' => !$config['block']['height'],
      'bg-background flex flex-col justify-center relative',
      'p-0' => $width == 'full',
      'p-sm sm:p-md md:p-lg xl:p-xl' => $width == 'narrow',
      'p-xs sm:p-sm md:p-md xl:p-lg' => $width == 'wide',
      'xl:order-first' => $order == 'first'
    ])
  >
    <x-media 
      data-aos="fade-in"
      id="{!! $content['image'] !!}"
      @class([
        'object-cover',
        'w-full h-auto rounded-lg' => $width != 'full',
        'absolute inset-0 w-full h-full' => $width == 'full',
      ])
    />
  </div>
</section>