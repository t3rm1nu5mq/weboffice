<template>
    <layout>
        <template v-slot:content>
            <div class="container">
                <div class="row">
                    <h2>Tokenek kezelése</h2>
                </div>
                <div class="row">
                    <div class="col-12" style="text-align: center">
                        <passport-clients></passport-clients>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" style="text-align: center">
                        <passport-authorized-clients></passport-authorized-clients>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" style="text-align: center">
                        <passport-personal-access-tokens></passport-personal-access-tokens>
                    </div>
                </div>
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
        },

        data() {
            return {
            }
        }
    }
</script>

<style scoped>

</style>
