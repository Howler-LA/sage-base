<footer data-theme="dark" class="py-sm md:pt-md xl:pt-lg border-t bg-background text-foreground flex flex-col gap-sm xl:gap-xl">

  <x-container>
    <div class="h-32 bg-white/10"></div>
  </x-container>

  <x-container class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-y-xs gap-x-sm md:gap-y-sm xl:gap-y-lg">
    <x-footer 
      class="flex flex-col md:grid-cols-2 md:col-span-2 xl:col-span-3 grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-y-xs gap-x-sm md:gap-y-sm xl:gap-y-lg"
      name="footer_navigation" 
    />
    <div class="flex flex-col">
      <div class="font-medium pb-4">Category</div>
      <div class="border border-foreground rounded-2xl flex-grow min-h-48 lg:min-h-0 p-sm flex flex-col">
        <div class="h-full bg-white/10 rounded-xl flex flex-col items-center justify-center">asdfasd</div>
      </div>
    </div>
  </x-container>

  <x-container class="flex flex-col gap-sm">
    <div class="flex flex-col gap-1">
      @repeat(2)<div class="h-px bg-foreground"></div>@endrepeat
    </div>
    <div class="h-32 bg-white/10"></div>
  </x-container>

</footer>