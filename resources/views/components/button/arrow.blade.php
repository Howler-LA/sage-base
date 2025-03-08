<div class="size-6 opacity-50 overflow-hidden">
  <div @class(['size-12 grid grid-cols-2 transition ease duration-300 -translate-x-1/2 group-hover:translate-x-0 group-hover:-translate-y-1/2'])>
    @repeat(2)
      <x-lucide-arrow-up-right class="first:col-start-2 last:row-start-2 last:col-start-1" />
    @endrepeat
  </div>
</div>