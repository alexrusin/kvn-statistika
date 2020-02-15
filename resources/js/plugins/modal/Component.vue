<template>
    <div :id="name" :class="overlayClass">
        <div 
        @click="closeModal"
        class="cancel"></div>

        <div class="modal">
            <slot></slot>

            <footer class="flex mt-8">
                <slot name="footer"></slot>
            </footer>

            <div
            @click="closeModal" 
            href="#" class="close cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="w-5 h-5 fill-current text-gray-800">
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['name'],
    created() {
         window.events.$on('openModal', this.openModal);
    },

    data() {
        return {
            overlayClass: 'overlay'
        };
    },

    methods: {
        openModal(name) {
            console.log ('hit open modal');
            if (name == this.name) {
                this.overlayClass = 'overlay overlay-visible';
            }
        },

        closeModal(name) {
            this.overlayClass = 'overlay';
        }
    }
    
}
</script>

<style scoped type="text/css">
    footer:empty {
        display: none;
    }
    .overlay {
        visibility: hidden;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: rgba(0, 0, 0, .4);
        transition: opacity .3s;
        opacity: 0;
        height: 100%;
    }
    .overlay:target {
        visibility: visible;
        opacity: 1;
    }

    .overlay-visible {
        visibility: visible;
        opacity: 1;
    }

    .modal {
        position: fixed;
        margin-top: 5em;
        left: 50%;
        margin-left: -30em;
        width: 60em;
        background: white;
        border-radius: 4px;
        padding: 2.5em;
        box-shadow: 0 5px 11px rgba(36, 37, 38, 0.08);
    }

    @media only screen and (max-width: 1024px) {
        .modal {
            margin-left: -25em;
            width: 50em;
        }
    }

    @media only screen and (max-width: 768px) {
        .modal {
            margin-left: -20em;
            width: 40em;
        }
    }

    @media only screen and (max-width: 640px) {
        .modal {
            margin-left: -11em;
            width: 22em;
        }
    }
    .modal .close {
        position: absolute;
        top: 15px;
        right: 15px;
        color: grey;
        text-decoration: none;
    }
    .overlay .cancel {
        position: absolute;
        width: 100%;
        height: 100%;
    }
</style>