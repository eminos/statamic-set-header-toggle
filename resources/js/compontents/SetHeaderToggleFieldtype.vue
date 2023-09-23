<template>
    <div>
        <div v-if="showError" class="text-sm text-red-500">
            Couldn't find an ancestor set header.<br>
            This fieldtype is supposed to be used in a Replicator or Bard set.
        </div>
        <div v-else class="set-header-toggle-wrapper flex gap-4 items-center">
            <div class="set-header-toggle toggle-fieldtype-wrapper mr-4" :class="{ 'toggle-sm': config.toggle_size === 'small' }" :style="style">
                <toggle-input :value="value" @input="update" v-tooltip="{content: config.display, delay: 50, autoHide: false}"></toggle-input>
            </div>
        </div>
    </div>
</template>

<script>
export default {

    mixins: [Fieldtype],

    data() {
        return {
            showError: false,
        };
    },

    computed: {
        style() {
            return {
                '--color': this.config.toggle_color,
            };
        },
    },

    mounted() {
        let ancestorSet = null
        let currentElement = this.$el.parentElement

        while (currentElement) {
            if (currentElement.classList.contains('replicator-set') || currentElement.classList.contains('bard-set')) {
                ancestorSet = currentElement
                break
            }

            currentElement = currentElement.parentElement
        }

        if (!ancestorSet) {
            this.showError = true
            return
        }

        if (ancestorSet.querySelector('.replicator-set-header .replicator-set-controls .set-header-toggle-wrapper')) {
            ancestorSet.querySelector('.replicator-set-header .replicator-set-controls .set-header-toggle-wrapper').appendChild(this.$el.querySelector('.set-header-toggle'))
        } else {
            ancestorSet.querySelector('.replicator-set-header .replicator-set-controls').prepend(this.$el.querySelector('.set-header-toggle-wrapper'))
        }

        this.$el.closest('.publish-field').classList.add('super-invisible')
        
    },
};
</script>

<style>
.set-header-toggle .toggle-container.on {
    background-color: var(--color);
    border-color: darkgray;
}

.super-invisible {
    visibility: hidden;
    position: absolute;
    top: 0;
    left: 0;
    width: 0;
    height: 0;
}
</style>