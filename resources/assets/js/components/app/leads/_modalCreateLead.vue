<template>
    <modals title="Create Lead" :showSearch="modal.search" :showCreate="modal.create" v-if="showModals" :showModals.sync="showModals">
        <template slot="bodyCreate">
            <form class="col-12 px-0 create-form">
                <div class="mt-5 row align-items-center">
                    <span class="font-size-3 mr-0 ti-user mr-1 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Name:</label>
                    <input name="name" placeholder="Lead Name" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" :class="{'is-invalid': errors.name }" v-model="lead.name" required>
                    <span v-if="errors.name" class="ml-3 text-danger float-right">{{ errors.name }}</span>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="font-size-3 ti-email mr-1 text-primary"></span>
                    <input placeholder="Email" name="email" type="email" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" :class="{'is-invalid': errors.email }" @change="checkEmail" v-model="lead.email" required>
                    <span v-if="errors.email" class="ml-3 text-danger float-right">{{ errors.email }}</span>
                </div>
                <div v-if="emailAlreadyExist" class="my-4 border p-3">
                    <div class="text-center">¡Wait! A contact already exists with this email address
                        <router-link :to="{ name: 'contacts-id', params: { id: contact.id }}">{{lead.email}}
                        </router-link>
                    </div>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="font-size-3 ti-mobile mr-1 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Phone Number:</label>
                    <the-mask placeholder="Lead Phone Number" name="phone" :mask="'(###)-###-####'" v-model="lead.phone" type="tel" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent"/>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="font-size-3 ti-location-pin mr-1 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Address:</label>
                    <input placeholder="Lead Address" name="Lead address" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="lead.address">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="font-size-3 mr-0 ti-map-alt mr-1 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Zip Code:</label>
                    <input placeholder="Lead Zip Code" name="Lead zipcode" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="lead.zipcode_id" @change="zipcode">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="font-size-3 ti-direction mr-1 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">City:</label>
                    <input placeholder="Lead City" readonly class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent disabled" v-model="lead.city">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="font-size-3 ti-flag-alt mr-1 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">State:</label>
                    <input placeholder="Lead State" readonly class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent disabled" v-model="lead.state">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="font-size-3 ti-credit-card mr-1 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Social Security:</label>
                    <the-mask placeholder="Lead Social Security" name="ssn" type="tel" v-model="lead.social_security" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" :mask="'###-##-####'"/>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="mr-0 font-size-3 ti-calendar mr-1 text-primary"></span>
                    <datepicker placeholder="Birthday" type="date" name="birthdate" class="col px-0" v-model="lead.birthdate" :format="'M-d-yyyy'" :input-class="'small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent'"></datepicker>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="font-size-3 ti-id-badge mr-1 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Broker:</label>
                    <v-select placeholder="Lead Broker" class="col-12 px-0 info-select font-weight-light"  v-model="lead.executive_id" label="name" :options="brokers"></v-select>
                </div>
                <div class="mt-4 row align-items-center mb-5">
                    <span class="font-size-3 ti-world mr-1 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Web Source:</label>
                    <input placeholder="Web source" type="url" name="source" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="lead.source">
                </div>
                <div class="my-5 py-5"></div>

            </form>
        </template>
        <template slot="buttonCreate">
            <button :disabled="saving" type="submit" @click.prevent="create" class="btn-primary rounded-0 py-2 px-3 small text-white float-md-right float-left d-flex align-items-center mr-md-0 mr-3">
                <font-awesome-icon v-if="saving" icon="circle-notch" class="min-w-60 my-1" spin/>
                <template v-if="!saving"><span class="ti-user mr-1"></span>Create Lead</template>
            </button>
        </template>
    </modals>
</template>

<script>
    import modals from './../../helpers/modals/modals'
    import api from './../../../config/api'

    export default {
        components: {modals},
        name: "modalCreateLead",
        props: {
            showSearch: Boolean,
            showCreate: Boolean,
        },
        data() {
            return {
                lead: {
                    name: null,
                    email: '',
                    phone: '',
                    zipcode_id: '',
                    address: '',
                    city: '',
                    state: '',
                    social_security: '',
                    birthday: '',
                    executive_id: null,
                    source: '',
                },
                saving: false,
                brokers: [],
                emailAlreadyExist: false,
                showModals: true,
                contact: {},
                errors: {email: null, name: null},
                modal: {search:this.showSearch, create: this.showCreate}
            }
        },
        watch: {
            showModals(value) {
                if (!value) this.$emit('closeModal')
            },
            'lead.name': function () {
                this.errors.name = null
            },
            'lead.email': function () {
                this.errors.email = null
            }
        },
        methods: {
            validForm() {
                let validate = true
                if (!this.lead.name) {
                    this.errors.name = 'This field is required.';
                    validate = false
                }

                if (!this.validEmail(this.lead.email)) {
                    this.errors.email = "Valid email required.";
                    validate = false
                }

                if (this.emailAlreadyExist) {
                    this.errors.email = "This email already exist.";
                    validate = false;
                }

                return validate

            },
            checkEmail() {
                if (this.validEmail(this.lead.email)) {
                    this.errors.email = false;
                    api.Contacts().checkEmail(this.lead).then(() => {
                        this.emailAlreadyExist = false
                    }).catch(error => {
                        this.contact = error.response.data.error.data
                        this.emailAlreadyExist = true
                    })
                } else {
                    this.emailAlreadyExist = false

                }
            },
            create() {
                if (this.validForm()) {
                    this.saving = true
                    api.Leads().create(this.lead).then(response => {
                        console.log(response.data)
                        this.$router.push({name: 'leads-id', params: {id: response.data.data.id}})
                        this.showCreate = false
                        this.$store.commit('set_blur', false);
                        api.SuccessResponse(response)
                        this.saving = false
                    }).catch(error => {
                        api.ErrorResponse(error)
                        this.saving = false
                    })
                }
            },
            updateBroker(value) {
                console.log(value)
            },
            zipcode(value) {

                api.Zipcodes().getOne(value.target.value).then(response => {
                    this.lead.city = response.data.data.city.name
                    this.lead.state = response.data.data.city.state.name
                })

            },
            validEmail: function (email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },
        },
        mounted() {
            api.Brokers().getAll().then(response => this.brokers = _.sortBy(response.data.data, 'name'))

        },
    }
</script>

<style scoped>

</style>