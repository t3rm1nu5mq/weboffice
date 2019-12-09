<template>
    <layout>
        <template v-slot:content>
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
        </template>
    </layout>
</template>

<script>
    import layout from './Layout';

    export default {
        name: 'Dashboard',

        components: {
            layout
        }
    }
</script>
