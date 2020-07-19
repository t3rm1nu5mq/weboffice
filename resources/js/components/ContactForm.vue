<template>
    <div>
        <form v-if="name == ''">
            <div class="row">
                <div class="col-sm-12 col-md-6 form-line">
                    <div class="form-group">
                        <label for="name">Az Ön neve</label>
                        <input class="form-control" id="name" placeholder=" Az én nevem" type="text"
                               v-model="contactData.name">
                    </div>
                    <div class="form-group">
                        <label for="email">Az Ön e-mail címe</label>
                        <input class="form-control" id="email" placeholder=" azennevem@azenoldalam.hu"
                               type="email" v-model="contactData.email">
                    </div>
                    <div class="form-group">
                        <label for="telephone">Az Ön telefonszáma</label>
                        <input class="form-control" id="telephone" placeholder=" Mobil vagy vezetékes szám" type="tel"
                               v-model="contactData.phone">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label for="message"> Üzenet</label>
                        <textarea class="form-control" id="message" placeholder="Röviden írja le megkeresése tárgyát"
                                  v-model="contactData.message"></textarea>
                    </div>
                    <div id="sendbutton">
                        <button @click="send" class="btn btn-default submit" style="width: fit-content" type="button">
                            <i aria-hidden="true" class="fa fa-paper-plane" v-if="!sending"></i>
                            <i class="fa fa-spinner fa-spin" v-if="sending"></i>Üzenet küldése
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <div v-if="name !== ''">
            <div class="row">
                <div class="col-12" style="font-size: 36px; text-align: center">
                    Kedves {{ name }}!
                </div>
                <div class="col-12" style="font-size: 16px; text-align: center">
                    Üzenetét megkaptam. Az Ön által megadott elérhetőségeken rövidesen keresni fogom.
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ContactForm",
        data() {
            return {
                sending: false,
                contactData: {
                    name: '',
                    email: '',
                    phone: '',
                    message: ''
                },
                name: ''
            }
        },
        methods: {
            send() {
                const that = this;
                this.sending = true;
                axios.post('/api/send_contact_message', that.contactData).then(function (response) {
                    that.name = response.data.name;
                    that.contactData = {
                        name: '',
                        email: '',
                        phone: '',
                        message: ''
                    },
                        that.sending = false;
                })
                    .catch(function (error) {
                        console.log(error);
                        that.sending = false;
                    });
            }
        }
    }
</script>

<style scoped>

</style>
