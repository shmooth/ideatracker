require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import VueFinalModal from 'vue-final-modal'
import VueMoment from 'vue-moment';
import moment from 'moment';



const el = document.getElementById('app');

let app = createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin)
    .use(VueFinalModal())
    //.use(require('vue-moment'))
    .mount(el);

//app.config.globalProperties.$moment=moment;

InertiaProgress.init({ color: '#4B5563' });




