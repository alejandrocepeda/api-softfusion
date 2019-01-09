<template>
    <modals title="Create Lender" :showCreate="true" v-if="showModals" :showModals.sync="showModals">
        <template slot="bodyCreate">
            <form class="col-12 px-0 create-form">
                <div class="mt-5 row align-items-center">
                    <span class="ti-user mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Name:</label>
                    <input placeholder="Lender Name" name="name" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" :class="{'is-invalid': errors.name }" v-model="lender.name" required>
                    <span v-if="errors.name" class="ml-3 text-danger float-right">{{ errors.name }}</span>

                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-email mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Email:</label>
                    <input placeholder="Lender Email" name="email" type="email" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" :class="{'is-invalid': errors.email }" @change="checkEmail" v-model="lender.email" required>
                    <span v-if="errors.email" class="ml-3 text-danger float-right">{{ errors.email }}</span>
                </div>
                <div v-if="emailAlreadyExist" class="my-4 border p-3">
                    <div class="text-center">¡Wait! A lender already exists with this email address
                        <router-link :to="{ name: 'lenders-id', params: { id: lender.id }}">{{lender.email}}
                        </router-link>
                    </div>
                </div>

                <div class="mt-4 row align-items-center">
                    <span class="ti-mobile mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Phone Number:</label>
                    <the-mask placeholder="Lender Phone Number" name="phone" :mask="'(###)-###-####'" v-model="lender.phone" type="tel" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent"/>
                </div>

                <div class="mt-4 row align-items-center">
                    <span class="ti-location-pin mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Phone Number:</label>
                    <input placeholder="Lender Address" name="address" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="lender.address">
                </div>

                <div class="mt-4 row align-items-center">
                    <span class="ti-map-alt mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Zipcode:</label>
                    <input placeholder="Lender Zip Code" name="zipcode" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="lender.zipcode_id" @change="zipcode">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-direction mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">City:</label>
                    <input placeholder="Lender City" readonly class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent disabled" v-model="lender.city">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-flag-alt mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Zipcode:</label>
                    <input placeholder="State" readonly class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent disabled" v-model="lender.state">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-minus mr-1 text-primary mr-0 font-size-3"></span> <label class="font-weight-normal mb-0 small text-primary">Min Loan Size:</label>
                    <v-money prefix="$" placeholder="Min Loan Size" :money.sync="lender.min_loan_size" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" :class="{'is-invalid': errors.min_loan_size }" ></v-money>
                    <span v-if="errors.min_loan_size" class="ml-3 text-danger float-right">{{ errors.min_loan_size }}</span>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-plus mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Max Loan Size:</label>
                    <v-money prefix="$" placeholder="Max Loan Size" :money.sync="lender.max_loan_size" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" :class="{'is-invalid': errors.max_loan_size }"></v-money>
                    <span v-if="errors.max_loan_size" class="ml-3 text-danger float-right">{{ errors.max_loan_size }}</span>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-plus mr-1 text-primary mr-0 font-size-3"></span>
                    <label class="font-weight-normal mb-0 text-primary small">Max Interest:</label>
                    <the-mask placeholder="Lender Max Interest" :mask="['##.# %','#.# %','# %']" type="tel" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="lender.max_interest"/>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-minus mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Min Interest:</label>
                    <the-mask placeholder="Lender Min Interest" :mask="['##.# %','#.# %','# %']" type="tel" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="lender.min_interest"/>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-plus mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Max Terms:</label>
                    <the-mask placeholder="Lender Max Terms" :mask="['### Months','## Months','# Months']" type="tel" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="lender.max_terms"/>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-minus mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Min Terms:</label>
                    <the-mask placeholder="Lender Min Terms" :mask="['### Months','## Months','# Months']" type="tel" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="lender.min_terms"/>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-minus mr-1 text-primary font-size-3" style="border:1px solid; border-radius:100%; padding:0;"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Negative Days:</label>
                    <input placeholder="Negative Days" type="number" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="lender.negative_days"/>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-support mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Puerto Rico:</label>
                    <select v-model="lender.puerto_rico" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" :class="{'is-invalid': errors.puerto_rico }">
                        <option value="" disabled selected>Puerto Rico</option>
                        <option :value="false">No</option>
                        <option :value="true">Yes</option>
                    </select>
                    <span v-if="errors.puerto_rico" class="ml-3 text-danger float-right">{{ errors.puerto_rico }}</span>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-money mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Weekly Payments:</label>
                    <select v-model="lender.weekly_payments" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" :class="{'is-invalid': errors.weekly_payments }" >
                        <option value="" disabled selected>Weekly Payments</option>
                        <option :value="false">No</option>
                        <option :value="true">Yes</option>
                    </select>
                    <span v-if="errors.weekly_payments" class="ml-3 text-danger float-right">{{ errors.weekly_payments }}</span>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-flag mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Consolidation Refinance:</label>
                    <select v-model="lender.consolidation_refinance" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" :class="{'is-invalid': errors.consolidation_refinance }" >
                        <option value="" disabled selected>Consolidation Refinance</option>
                        <option :value="false">No</option>
                        <option :value="true">Yes</option>
                    </select>
                    <span v-if="errors.consolidation_refinance" class="ml-3 text-danger float-right">{{ errors.consolidation_refinance }}</span>
                </div>

                <div class="my-5 py-5"></div>

            </form>
        </template>
        <template slot="buttonCreate">
            <button type="submit" @click.prevent="create" class="btn-primary rounded-0 py-2 px-3 small text-white float-md-right float-left d-flex align-items-center mr-md-0 mr-3">
                <span class="ti-user mr-1"></span>Create Lender
            </button>
        </template>
    </modals>
</template>

<script>
    import modals from './../../../helpers/modals/modals'
    import api from './../../../../config/api'

    export default {
        components: {modals},
        name: "modalCreateLender",
        data() {
            return {
                lender: {
                    name: null,
                    email: '',
                    phone: '',
                    zipcode_id: '',
                    address: '',
                    city: '',
                    state: '',
                    role:7,
                    max_interest:0,
                    min_interest:0,
                    puerto_rico: '',
                    weekly_payments: '',
                    consolidation_refinance: '',

                    min_loan_size: null,
                    max_loan_size: null,

                },
                emailAlreadyExist: false,
                showModals: true,
                lenderAlreadyExist: null,
                errors: {
                    email: null,
                    name: null,
                    min_loan_size: null,
                    max_loan_size: null,
                    puerto_rico:null,
                    weekly_payments:null,
                    consolidation_refinance:null
                },
            }
        },
        watch: {
            showModals(value) {
                if (!value) this.$emit('closeModal')
            },
            'lender.name': function(){
                this.errors.name = null
            },
            'lender.puerto_rico': function(){
                this.errors.puerto_rico = null
            },
            'lender.weekly_payments': function(){
                this.errors.weekly_payments = null
            },
            'lender.consolidation_refinance': function(){
                this.errors.consolidation_refinance = null
            },
            'lender.min_loan_size': function(){
                this.errors.min_loan_size = null
            },
            'lender.max_loan_size': function(){
                this.errors.max_loan_size = null
            },
            'lender.email': function(){
                this.errors.email = null
            }
        },
        methods: {
            validForm() {
                let validate = true
                if (!this.lender.name) {
                    this.errors.name = 'This field is required.';
                    validate = false
                }

                if (this.lender.puerto_rico==='') {
                    this.errors.puerto_rico = 'This field is required.';
                    validate = false
                }
                if (this.lender.consolidation_refinance==='') {
                    this.errors.consolidation_refinance = 'This field is required.';
                    validate = false
                }
                if (this.lender.weekly_payments==='') {
                    this.errors.weekly_payments = 'This field is required.';
                    validate = false
                }

                if (!this.lender.min_loan_size) {
                    this.errors.min_loan_size = 'This field is required.';
                    validate = false
                }

                if (!this.lender.max_loan_size) {
                    this.errors.max_loan_size = 'This field is required.';
                    validate = false
                }

                if (!this.validEmail(this.lender.email)) {
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
                if (this.validEmail(this.lender.email)) {
                    this.errors.email = false;
                    api.Lenders().checkEmail(this.lender).then(() => {
                        this.emailAlreadyExist = false
                    }).catch(error => {
                        this.lender = error.response.data.error.data
                        this.emailAlreadyExist = true
                    })
                } else {
                    this.emailAlreadyExist = false

                }
            },
            create() {
                if (this.validForm()) {
                    api.Lenders().create(this.lender).then(response => {
                        console.log(response.data)
                        this.$router.push({name: 'lenders-id', params: {id: response.data.data.id}})
                        this.showCreate = false
                        this.$store.commit('set_blur', false);
                        api.SuccessResponse(response)
                        this.saving = false
                    }).catch(function(error){
                        this.saving = false
                        api.ErrorResponse(error)
                    })
                }
            },
            zipcode(value) {

                api.Zipcodes().getOne(value.target.value).then(response => {
                    this.lender.city = response.data.data.city.name
                    this.lender.state = response.data.data.city.state.name
                })

            },
            validEmail: function (email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },
        }
        ,
        mounted() {

        }
        ,
    }
</script>

<style scoped>

</style>
