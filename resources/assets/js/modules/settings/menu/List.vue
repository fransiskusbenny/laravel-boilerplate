<template>
    <v-jstree :data="data"
              multiple
              allow-batch
              whole-row
              @item-click="clicked"
    ></v-jstree>
</template>

<script>
    import VJstree from 'vue-jstree'

    export default {
        components: {VJstree},

        props: {
            menus: {
                required: true,
                type: Array
            }
        },

        data() {
            return {
                data: [],
            }
        },

        mounted() {
            this.prepareComponent()
        },

        methods: {
            prepareComponent() {
                this.data = this.menus.map(menu => {
                    let {id, name, icon, childs, permission} = menu

                    return {
                        menu,
                        id,
                        icon,
                        permission,
                        text: name,
                        opened: true,
                        children: this.getChilds(childs)
                    }
                })
            },

            getChilds(childs) {
                return childs.map(child => {
                    let menu = child,
                        {id, name, icon, childs, permission} = menu
                    return {
                        menu,
                        id,
                        icon,
                        permission,
                        text: name,
                        opened: true,
                        children: this.getChilds(childs)
                    }
                })
            },

            clicked(node) {
                this.$emit('nodeClick', node)
            }
        }
    }
</script>