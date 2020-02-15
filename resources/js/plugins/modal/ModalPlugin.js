import Component from './Component';

let Plugin = {
    install: function (Vue, options = {}) {
        Vue.component('modal', Component);

        Vue.prototype.$modal = {
            show(name) {
                window.events.$emit('openModal', name);
            },

            hide(name) {
                window.events.$emit('closeModal', name);
            }
        }
    }
};

export default Plugin;