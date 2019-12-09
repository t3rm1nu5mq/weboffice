<template>
    <v-app id="inspire">
        <v-navigation-drawer
            v-model="drawer"
            app
            clipped
        >
            <v-list dense>
                <v-list-item @click="">
                    <v-list-item-action>
                        <v-icon>mdi-view-dashboard</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Dashboard</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
                <v-list-item @click="">
                    <v-list-item-action>
                        <v-icon>mdi-settings</v-icon>
                    </v-list-item-action>
                    <v-list-item-content>
                        <v-list-item-title>Settings</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar
            app
            clipped-left
            color="#801336"
        >
            <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>TerminusMq WebOffice</v-toolbar-title>
            <v-spacer></v-spacer>
            <v-btn text height="100%">
                <v-avatar color="#ee4540">
                    <v-icon dark>mdi-account-circle</v-icon>
                </v-avatar>
                <span style="padding-left: 5px">Szabó András Ferenc</span>
            </v-btn>
        </v-app-bar>

        <v-content>
            <slot name="content"></slot>
        </v-content>

        <v-footer padless color="#510a32" app>
            <v-col
                class="text-center">
                &copy; 2019 - All rights reserved. Developed by <b>TerminusMq</b>
            </v-col>
        </v-footer>
    </v-app>
</template>

<script>

    export default {
        name: "Layout",

        data() {
            return {
                drawer: false,
                filters: {
                    payment_methods: []
                }
            }
        },

        created () {
            this.$vuetify.theme.dark = true;
            const that = this;
            axios.post('/api/additional_data', that.filters).then(function(response) {
                console.log(response.data);
            }).catch(function(error) {
                console.log(error);
            });
        },
    }
</script>

<style scoped>
    .main-menu {
        cursor: pointer;
        border: 1px solid;
        border-radius: 15px;
        width: 150px;
        height: 150px;
        text-align: center;
        margin: 10px;
        font-size: large;
        padding: 20px;
        background-color: #2d142c;
        color: white;
    }

    .main-menu:hover {
        background-color: #510a32;
        color: white;
        font-weight: bold;
    }

    .main-menu-icon {
        height: 70px;
        width: auto;
    }
</style>
