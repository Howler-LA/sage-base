@aware([
  'order' => null
])

<div
  @class([
    'contained',
    'w-full xl:max-w-browser-half',
    $order ? 'xl:group-odd/column:pr-container' : '',
    $order ? 'xl:group-odd/column:pl-container' : '',
    $order ? 'mr-auto' : 'ml-auto p-med xl:p-container'
  ])
>
  {{ $slot }}
</div>
