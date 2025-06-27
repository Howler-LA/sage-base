@props([
  'direction' => 'left'
])

<div
  @class([
    'w-full xl:max-w-browser-half',
    'xl:group-even/column:pr-med group-even/column:mr-auto',
    'xl:group-odd/column:pl-med group-odd/column:ml-auto',
  ])
>
  {{ $slot }}
</div>
