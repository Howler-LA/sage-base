@set($width,'narrow')
@set($order,'last')

<div class="grid xl:grid-cols-2">
  <div 
    data-theme="light" 
    @class([
      'bg-background text-foreground flex flex-col justify-center',
      'p-xs sm:p-sm md:p-md xl:p-lg',
      'flex',
      'items-end' => $order == 'last',
    ])
  >
    <x-lockup
      @class([
        'max-w-[calc(calc(var(--spacing-mega)*.5)-calc(var(--spacing-lg)*2))]'
      ])
      eyebrow="Eyebrow content"
      headline="This is a test"
      copy="It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)."
    />
  </div>
  <div 
    data-theme="dark" 
    @class([
      'min-h-[calc(100vh-136px)]',
      'bg-background flex flex-col justify-center relative',
      'p-0' => $width == 'full',
      'p-sm sm:p-md md:p-lg xl:p-xl' => $width == 'narrow',
      'p-xs sm:p-sm md:p-md xl:p-lg' => $width == 'wide',
      'xl:order-first' => $order == 'first'
    ])
  >
    <x-image 
      id="91" 
      @class([
        'w-full h-full object-cover shadow-2xl shadow-black/5',
        'absolute inset-0' => $width == 'full',
      ])
    />
  </div>
</div>