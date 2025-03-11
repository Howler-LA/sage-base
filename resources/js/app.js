import Alpine from 'alpinejs'
import AOS from 'aos';

import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

window.Alpine = Alpine
Alpine.start()
AOS.init({
  duration: 800,
});