<template>
    <layout>
        <template v-slot:content>
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <h2>Pénzügyek kezelése</h2>
                        <div class="row infobox">
                            <v-dialog
                                v-model="addDialogVisible"
                                width="80%"
                            >
                                <template v-slot:activator="{ on }">
                                    <button class="btn btn-primary" v-on="on">
                                        <i class="fas fa-plus"/> Új pénzügyi tranzakció
                                    </button>
                                </template>

                                <v-card>
                                    <v-card-title class="headline">Új pénzügyi tranzakció</v-card-title>

                                    <v-card-text>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <v-text-field
                                                    v-model="modalData.partner"
                                                    color="#ffffff"
                                                    label="Partner"
                                                    outlined
                                                    shaped
                                                    clearable
                                                />
                                            </div>
                                            <div class="col-md-3">
                                                <v-select
                                                    v-model="modalData.type"
                                                    :items="payment_methods"
                                                    label="Tranzakció típusa"
                                                    color="#ffffff"
                                                    item-text="name"
                                                    item-value="value"
                                                    shaped
                                                    outlined
                                                ></v-select>
                                            </div>
                                            <div class="col-md-4">
                                                <v-text-field
                                                    v-model="modalData.amount"
                                                    color="#ffffff"
                                                    label="Összeg (Ft)"
                                                    outlined
                                                    shaped
                                                    clearable
                                                ></v-text-field>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <v-select
                                                    v-model="modalData.payment_method"
                                                    :items="payment_methods"
                                                    label="Fizetés módja"
                                                    color="#ffffff"
                                                    item-text="name"
                                                    item-value="value"
                                                    shaped
                                                    outlined
                                                />
                                            </div>
                                            <div class="col-md-3">
                                                <v-menu
                                                    ref="menu"
                                                    v-model="deadlineSelector"
                                                    :close-on-content-click="false"
                                                    :return-value.sync="modalData.deadline"
                                                    transition="scale-transition"
                                                    offset-y
                                                    min-width="290px"
                                                >
                                                    <template v-slot:activator="{ on }">
                                                        <v-text-field
                                                            v-model="modalData.deadline"
                                                            label="Fizetési határidő"
                                                            readonly
                                                            outlined
                                                            shaped
                                                            v-on="on"
                                                        />
                                                    </template>
                                                    <v-date-picker v-model="modalData.deadline" no-title scrollable>
                                                        <v-spacer></v-spacer>
                                                        <v-btn text color="primary" @click="deadlineSelector = false">
                                                            Cancel
                                                        </v-btn>
                                                        <v-btn text color="primary"
                                                               @click="$refs.menu.save(modalData.deadline)">OK
                                                        </v-btn>
                                                    </v-date-picker>
                                                </v-menu>
                                            </div>
                                            <div class="col-md-1">
                                                <label>Fizetve</label>
                                                <v-switch
                                                    style="margin-top: 0px !important"
                                                    v-model="modalData.paid"
                                                    color="success"
                                                    inset
                                                >
                                                </v-switch>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Számla generálása</label>
                                                <v-switch
                                                    style="margin-top: 0 !important"
                                                    v-model="modalData.with_invoice"
                                                    color="red"
                                                    inset
                                                >
                                                </v-switch>
                                            </div>
                                            <div class="col-md-3" v-if="modalData.with_invoice">
                                                <v-select
                                                    v-model="modalData.payment_method"
                                                    :items="invoice_types"
                                                    label="Számla típusa"
                                                    color="#ffffff"
                                                    item-text="name"
                                                    item-value="value"
                                                    shaped
                                                    outlined
                                                />
                                            </div>
                                        </div>
                                        <div class="row" v-if="modalData.with_invoice">
                                            <div class="col-md-6">
                                                <h3>Számla tételei</h3>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row" style="margin-left: 10px">
                                                    <v-text-field
                                                        style="width: 200px"
                                                        v-model="invoice_item.title"
                                                        color="#ffffff"
                                                        label="Megnevezés"
                                                        outlined
                                                        shaped
                                                        clearable
                                                    />
                                                    <v-text-field
                                                        style="width: 60px"
                                                        v-model="invoice_item.count"
                                                        color="#ffffff"
                                                        label="Mennyiség"
                                                        outlined
                                                        shaped
                                                        clearable
                                                    />
                                                    <v-text-field
                                                        style="width: 80px"
                                                        v-model="invoice_item.unit"
                                                        color="#ffffff"
                                                        label="Mennyiségi egység"
                                                        outlined
                                                        shaped
                                                        clearable
                                                    />
                                                    <v-text-field
                                                        style="width: 50px"
                                                        v-model="invoice_item.unit_price"
                                                        color="#ffffff"
                                                        label="Egységár"
                                                        outlined
                                                        shaped
                                                        clearable
                                                    />
                                                    <v-text-field
                                                        style="width: 50px"
                                                        v-model="invoice_item.vat"
                                                        color="#ffffff"
                                                        label="ÁFA"
                                                        outlined
                                                        shaped
                                                        clearable
                                                    />
                                                    <v-btn class="mx-2" fab dark small color="green">
                                                        <v-icon dark>mdi-plus</v-icon>
                                                    </v-btn>
                                                </div>
                                            </div>
                                            <div class="col-md-12" style="margin-left: 10px"
                                                 v-if="modalData.invoice_items.length > 0">
                                                <table border="1px" style="width: 80%; color: white; margin: auto" >
                                                    <tr style="text-align: center">
                                                        <th>Megnevezés</th>
                                                        <th style="width: 100px">Mennyiség</th>
                                                        <th style="width: 160px">Mennyiségi egység</th>
                                                        <th>Egységár</th>
                                                        <th>Nettó összeg</th>
                                                        <th>Bruttó összeg</th>
                                                        <th>Törlés</th>
                                                    </tr>
                                                    <tr v-for="item in modalData.invoice_items" style="text-align: center">
                                                        <td style="text-align: left !important; padding-left: 10px !important">{{item.title}}</td>
                                                        <td style="padding-left: 0px !important;">{{item.count}}</td>
                                                        <td style="padding-left: 0px !important;">{{item.unit}}</td>
                                                        <td style="padding-left: 0px !important;">{{item.unit_price}}</td>
                                                        <td style="padding-left: 0px !important;">{{item.netto_price}}</td>
                                                        <td style="padding-left: 0px !important;">{{item.brutto_price}}</td>
                                                        <td style="padding-left: 0px !important;"><v-icon color="red" dark>mdi-delete</v-icon></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </v-card-text>

                                    <v-card-actions>
                                        <v-spacer/>

                                        <v-btn
                                            text
                                            @click="addDialogVisible = false"
                                        >
                                            Mégsem
                                        </v-btn>

                                        <v-btn
                                            color="#801336"
                                            rounded
                                            @click="addDialogVisible = false"
                                        >
                                            Mentés
                                        </v-btn>
                                    </v-card-actions>
                                </v-card>
                            </v-dialog>

                            <button class="btn btn-primary">
                                <i class="fas fa-balance-scale"/> {{year}}. évi jelentés
                            </button>
                            <button class="btn btn-primary">
                                <i class="fas fa-balance-scale"/> {{month}}. havi jelentés
                            </button>
                            <br>
                            <button class="btn btn-primary">
                                <i class="fas fa-archive"/> Archívum
                            </button>
                            <button class="btn btn-primary" style="position: absolute; right: 35px">
                                <i class="fas fa-search"/> Keresés
                            </button>
                        </div>
                    </div>
                    <div class="col-md-3 infobox"
                         style="margin-top: 53px; color: black; position: fixed; top: 92.5px; right: 50px">
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
                month: new Date().getMonth() + 1,
                addDialogVisible: false,
                deadlineSelector: false,
                modalData: {
                    partner: "",
                    payment_method: "",
                    deadline: "",
                    paid: false,
                    type: "",
                    amount: "",
                    with_invoice: false,
                    invoice_type: null,
                    invoice_items: [
                        {
                            title: "Egyedi szoftverfejlesztés",
                            unit: "óra",
                            count: "120",
                            unit_price: "2000",
                            vat: "AAM",
                            netto_price: 240000,
                            brutto_price: 240000
                        }
                    ]
                },
                invoice_item: {
                    title: "",
                    unit: "",
                    count: "",
                    unit_price: "",
                    vat: "",
                    netto_price: 0,
                    brutto_price: 0
                },
                filters: {},
                payment_methods: [
                    {name: 'Készpénz', value: 1},
                    {name: 'Bankkártya', value: 0},
                    {name: 'Átutalás', value: 2},
                ],
                invoice_types: [
                    {name: 'Önszámla', value: 0},
                    {name: 'Számla', value: 1},
                    {name: 'Díjbekérő', value: 2},
                    {name: 'Előlegszámla', value: 3},
                    {name: 'Résszámla', value: 4},
                    {name: 'Sztornó számla', value: 5}
                ]
            }
        },

        mounted() {
            const that = this;
            axios.post('/api/additional_data', that.filters).then(function (response) {

            }).catch(function (error) {
                console.log(error);
            });
        },

        methods: {
            update() {
                const that = this;
                axios.post('/api/paymentd', {
                    data: that.modalData
                }).then(function(response){
                    console.log(response.data);
                })
                .catch(function(error) {
                    console.log(error);
                });
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
