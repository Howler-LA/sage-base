import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

import AOS from 'aos';
import Alpine from "alpinejs";
import focus from "@alpinejs/focus";
import anchor from "@alpinejs/anchor";
import collapse from "@alpinejs/collapse";
 
Alpine.plugin(focus);
Alpine.plugin(anchor);
Alpine.plugin(collapse);
 
const modules = import.meta.glob("./plugins/**/*.js", { eager: true });
 
for (const path in modules) {
    Alpine.plugin(modules[path].default);
}
 
Alpine.start();
AOS.init({
  duration: 1500
});