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
            <v-container
                fluid
            >
                <v-row
                    align="center"
                    justify="center"
                >
                    <v-col sm="2">
                        <v-card
                            color="#801336"
                            dark
                            shaped
                        >
                            <v-card-title class="headline">Projektek</v-card-title>
                            <v-card-text class="text-center font-weight-bold">1</v-card-text>
                        </v-card>
                    </v-col>
                    <v-col sm="2">
                        <v-card
                            color="#801336"
                            dark
                            shaped
                        >
                            <v-card-title class="headline">Partnerek</v-card-title>
                            <v-card-text class="text-center font-weight-bold">1</v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
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
        name: "Dashboard",

        data: () => ({
            drawer: false,
        }),

        created () {
            this.$vuetify.theme.dark = true
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
