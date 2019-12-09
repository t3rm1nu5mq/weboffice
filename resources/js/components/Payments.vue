<template>
    <layout>
        <template v-slot:content>
            <div class="container">
                <h2>Pénzügyek kezelése</h2>
            </div>
        </template>
    </layout>
</template>

<script>
    import layout from './Layout';

    export default {
        name: "Payments",

        components: {
            layout
        }
    }
</script>

<style scoped>

</style>
