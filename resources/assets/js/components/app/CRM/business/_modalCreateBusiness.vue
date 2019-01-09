<template>
    <modals @selected="selected" title="Create Business" :options="modal.businesses" :show-search.sync="modal.search" :show-create.sync="modal.create" v-if="showModals" :showModals.sync="showModals">
        <template slot="bodyCreate">
            <form class="col-12 px-0 create-form">
                <div class="mt-5 row align-items-center">
                    <span class="font-size-3 mr-0 ti-user mr-1  text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Name:</label>
                    <input placeholder="Business Name" name="name" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" :class="{'is-invalid': errors.name }" v-model="business.name" required>
                    <span v-if="errors.name" class="ml-3 text-danger float-right">{{ errors.name }}</span>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-email mr-1 text-p mr-0 font-size-3 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Federal Tax ID (EIN):</label>
                    <the-mask placeholder="Business Federal Tax ID (EIN)" @change="checkTax" name="federal_tax_id" :class="{'is-invalid': errors.federal_tax_id }"
                              :mask="'##-#####'" v-model="business.federal_tax_id" type="tel"
                              class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent"/>
                    <span v-if="errors.federal_tax_id" class="ml-3 text-danger float-right">{{ errors.federal_tax_id }}</span>
                </div>
                <div v-if="taxAlreadyExist" class="my-4 border p-3">
                    <div class="text-center">¡Wait! A Business already exists with this TAX ID
                        <router-link :to="{ name: 'business-id', params: { id: businessAlready.id }}">
                            {{businessAlready.name}}
                        </router-link>
                    </div>
                </div>
                <div class="mt-4  row align-items-center">
                    <span class="ti-world mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Web:</label>
                    <input placeholder="Business Web" type="url" name="web" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="business.web">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="font-size-3 mr-0 ti-mobile mr-1 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Phone Number:</label>
                    <the-mask placeholder="Business Phone Number" name="phone" :mask="'(###) ###-####'" v-model="business.phone" type="tel" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent"/>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="font-size-3 ti-location-pin mr-1 text-primary"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Address:</label>
                    <input placeholder="Business Address" name="address" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="business.address">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-map-alt mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Zip Code:</label>
                    <input placeholder="Business Zip Code" name="zipcode" class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent" v-model="business.zipcode_id" @change="zipcode">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-direction mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">City:</label>
                    <input placeholder="Business City" readonly class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent disabled" v-model="business.city">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-flag-alt mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">State:</label>
                    <input placeholder="Business State" readonly class="small border border-bottom border-left-0 border-right-0 border-top-0 form-control rounded-0 bg-transparent disabled" v-model="business.state">
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-id-badge mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Years in Business:</label>
                    <v-select placeholder="Years in Business" class="col-12 px-0 info-select font-weight-light" :value.sync="business.years_in_business_id" :options="yearsinbusiness"></v-select>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-money mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Anual Revenue:</label>
                    <v-select placeholder="Business Annual Revenue" class="col-12 px-0 info-select font-weight-light" :value.sync="business.annual_revenue_id" :options="annualrevenues"></v-select>
                </div>
                <div class="mt-4 row align-items-center">
                    <span class="ti-medall mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Credit Score:</label>
                    <v-select placeholder="Business Credit Score" class="col-12 px-0 info-select font-weight-light" :value.sync="business.credit_score_id" :options="creditscores"></v-select>
                </div>
                <div class="mt-4 row align-items-center mb-5">
                    <span class="ti-stats-up mr-1 text-primary font-size-3"></span>
                    <label class="font-weight-normal mb-0 small text-primary">Industry:</label>
                    <v-select placeholder="Business Industry" class="col-12 px-0 info-select font-weight-light" :value.sync="business.industry_id" :options="industries"></v-select>
                </div>
                <div class="my-5 py-5"></div>
            </form>
        </template>
        <template slot="buttonCreate">
            <button :disabled="saving" type="submit" @click.prevent="create" class="btn-primary rounded-0 py-2 px-3 small text-white float-md-right float-left d-flex align-items-center mr-md-0 mr-3">
                <font-awesome-icon v-if="saving" icon="circle-notch" class="min-w-60 my-1" spin/>
                <template v-if="!saving"><span class="ti-user mr-1"></span>Create Business</template>
            </button>
        </template>
    </modals>

</template>

<script>
    import api from '../../../../config/api'
    import modals from '../../../helpers/modals/modals'

    export default {
        components: {modals},
        name: "modalCreateBusiness",
        props: {
            showSearch: Boolean,
            showCreate: Boolean,
        },
        data() {
            return {
                business: {
                    id: '',
                    name: '',
                    federal_tax_id: '',
                    phone: '',
                    zipcode_id: '',
                    address: '',
                    state: '',
                    city: '',
                    industry_id: '',
                    credit_score_id: '',
                    annual_revenue_id: '',
                    years_in_business_id: '',
                    web: '',
                },
                saving: false,
                taxAlreadyExist: false,
                industries: [],
                creditscores: [],
                annualrevenues: [],
                yearsinbusiness: [],
                showModals: true,

                modal: {businesses: [], search: this.showSearch, create: this.showCreate},
                businessAlready: false,
                errors: {federal_tax_id: null, name: null},

            }
        },
        watch: {
            showModals(value) {
                if (!value) this.$emit('closeModal')
            },

            'business.name': function () {

                this.errors.name = null
            },
            'business.federal_tax_id': function () {
                this.errors.email = null
            },
            'modal.search': function () {
                this.loadBusiness()
            }
        },
        mounted() {
            this.loadBusiness()

        },
        methods: {
            loadBusiness() {
                if (this.modal.search) {
                    api.Business().getAll().then(response => this.modal.businesses = response.data.data)
                } else {
                    api.YearsInBusines().getAll().then(response => this.yearsinbusiness = response.data.data)
                    api.AnnualRevenues().getAll().then(response => this.annualrevenues = response.data.data)
                    api.CreditScores().getAll().then(response => this.creditscores = response.data.data)
                    api.Industries().getAll().then(response => this.industries = response.data.data)
                }
            },
            validForm() {
                let validate = true
                if (!this.business.name) {
                    this.errors.name = 'This field is required.';
                    validate = false
                }


                if (this.taxAlreadyExist) {
                    this.errors.federal_tax_id = "This Tax Id (EIN) already exist.";
                    validate = false;
                }

                return validate

            },
            zipcode(value) {

                api.Zipcodes().getOne(value.target.value).then(response => {
                    this.business.city = response.data.data.city.name
                    this.business.state = response.data.data.city.state.name
                })

            },
            checkTax() {
                api.Business().checkTaxId(this.business).then(() => {
                    this.taxAlreadyExist = false
                }).catch(error => {
                    this.businessAlready = error.response.data.error.data
                    this.taxAlreadyExist = true
                })

            },
            create() {
                if (this.validForm()) {
                    this.saving = true
                    api.Business().create(this.business).then(response => {
                        this.$emit('selected', response.data.data)
                        this.$router.push({name: 'businesses-id', params: {id: response.data.data.id}})
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
            selected(value) {
                console.log('event selected', value)
                this.$emit('selected', value)
            },
        }
    }
</script>

<style scoped>

</style>