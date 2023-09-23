import SetHeaderToggleFieldtype from './compontents/SetHeaderToggleFieldtype.vue';

Statamic.booting(() => {
    Statamic.$components.register('set_header_toggle-fieldtype', SetHeaderToggleFieldtype);
});
