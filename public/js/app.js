import { createApp, h } from 'vue/dist/vue.esm-bundler.js';
import { createInertiaApp, InertiaLink } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

InertiaProgress.init();

createInertiaApp({
    id: 'app',
    resolve: name => import(`./Pages/${name}.vue`),
    setup({ el, App, props, plugin }) {
        createApp({
            render: () => h(App, props),
        }).use(plugin).component('inertia-link', InertiaLink).mount(el);
    },
})
