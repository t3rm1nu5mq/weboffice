<template>
    <layout>
        <template v-slot:content>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h2>Pénzügyek kezelése</h2>
                        <div class="row infobox">
                            <button class="btn btn-primary">
                                <i class="fas fa-plus"></i> Új pénzügyi tranzakció
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-balance-scale"></i> {{year}}. évi jelentés
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-balance-scale"></i> {{month}}. havi jelentés
                            </button><br>
                            <button class="btn btn-primary">
                                <i class="fas fa-archive"></i> Archívum
                            </button>
                            <button class="btn btn-primary" style="position: absolute; right: 35px">
                                <i class="fas fa-search"></i> Keresés
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3 infobox" style="margin-top: 53px; color: black; position: fixed; top: 92.5px; right: 50px">
                        <h3 style="text-align: center">Statisztika</h3>
                        <table>
                            <tr>
                                <th>E havi bevétel:</th>
                                <td><i>0 Ft</i></td>
                            </tr>
                            <tr>
                                <th>Múlt havi bevétel:</th>
                                <td><i>0 Ft</i></td>
                            </tr>
                            <tr>
                                <th>Negyed éves bevétel:</th>
                                <td><i>0 Ft</i></td>
                            </tr>
                            <tr>
                                <th>Eddigi éves bevétel:</th>
                                <td><i>0 Ft</i></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <button class="btn btn-primary" style="position: fixed; top: 330px; right: 152.5px">
                    <img src="/images/nav.jpg" style="width: 100px"><br>
                    Ellenőrzés
                </button>
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
                year: new Date().getFullYear(),
                month: new Date().getMonth() + 1
            }
        }
    }
</script>

<style scoped>
    .btn-primary {
        margin: 5px;
    }
    td {
        padding-left: 30px
    }
    .row {
        margin-right: 15px
    }
</style>
