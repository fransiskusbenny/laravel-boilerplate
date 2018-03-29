<template>
    <select><slot></slot></select>
</template>

<script>
    import selectize from 'selectize'
    
    export default {
        props: ['options', 'value'],

        mounted() {
            let vm = this;
            let opt = $.extend({},$(this.$el).data());
            if (this.options != null)
                opt.options = this.options;
            this.sel = $(this.$el).selectize(opt)
                .on("change",() => {
                    vm.$emit('input', vm.sel.getValue());
                })[0].selectize;
            this.sel.setValue(this.value,true);
        },

        watch: {
            value(value) {
                this.sel.setValue(value,true);
            },
            options(options) {
                let val = this.sel.getValue();
                this.sel.clearOptions();
                this.sel.addOption(options);
                this.sel.refreshOptions(false);
                this.sel.setValue(val);
            }
        },

        destroyed() {
            this.sel.destroy();
        }
    }
</script>