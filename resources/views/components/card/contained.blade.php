@props([
  'direction' => 'left'
])

<div
  @class([
    'w-full xl:max-w-browser-half',
    'xl:group-even/column:pr-container group-even/column:mr-auto',
    'xl:group-odd/column:pl-container group-odd/column:ml-auto',
  ])
>
  {{ $slot }}
</div>
