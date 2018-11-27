<template>
    <div>
        <button v-if="!form" class="btn btn-primary">Add Land Details</button>
        <template v-else>
            <form @submit.prevent="onSubmit">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <v-textfield :form="form" name="lot_area"></v-textfield>
                            <v-textfield :form="form" name="street_number"></v-textfield>
                            <v-textfield :form="form" name="street"></v-textfield>
                            <v-textfield :form="form" name="suburb"></v-textfield>
                            <v-textfield :form="form" name="postcode"></v-textfield>
                        </div>
                        <div class="col-6">
                            <v-textfield :form="form" name="registered_plan" label="Registered Plan Date"></v-textfield>
                            <v-textfield :form="form" name="subdivided_rpsp" label="RP / SP"></v-textfield>
                            <v-textfield :form="form" name="subdivided_county" label="County"></v-textfield>
                            <v-textfield :form="form" name="subdivided_parish" label="Parish"></v-textfield>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <v-textfield class="pt-4" :form="form" name="original_lot_number"></v-textfield>
                            <v-textfield :form="form" name="original_rpsp" label="Original RP / SP"></v-textfield>
                            <v-textfield :form="form" name="original_county"></v-textfield>
                            <v-textfield :form="form" name="original_parish"></v-textfield>
                        </div>
                        <div class="col-6">
                            <v-textfield class="pt-4" :form="form" name="reconfigured_lot_number"></v-textfield>
                            <v-textfield name="reconfigured_rpsp" :form="form" label="Reconfigured RP / SP"></v-textfield>
                            <v-textfield :form="form" name="reconfigured_county"></v-textfield>
                            <v-textfield :form="form" name="reconfigured_parish"></v-textfield>
                    </div>
                </div>
    </div>
    <div class="card-footer">
        <button class="btn btn-primary">Save Land Details</button>
        <!--<button class="btn btn-danger" @click="deleteLandDetails()">Delete</button>-->
    </div>
    </form>
</template>
</div>
</template>
<script>
    export default {
        props: ['lot'],
        watch: {
            lot() {
                this.fetch();
            }
        },
        data() {
            return {
                form: new Form({
                    lot_area: '',
                    street_number: '',
                    street: '',
                    suburb: '',
                    postcode: '',
                    registered_plan: '',
                    subdivided_rpsp: '',
                    subdivided_county: '',
                    subdivided_parish: '',
                    original_lot_number: '',
                    original_rpsp: '',
                    original_county: '',
                    original_parish: '',
                    reconfigured_lot_number: '',
                    reconfigured_rpsp: '',
                    reconfigured_county: '',
                    reconfigured_parish: ''
                })
            }
        },
        mounted() {
            this.fetch();
        },
        methods: {
            onSubmit() {
                this.form.submit('patch', '/api/lots/' + this.lot + '/land-detail');
            },
            fetch() {
                axios.get('/api/lots/' + this.lot + '/land-detail').then(({data}) => {
                    this.form.addData(data);
                });
            }
        }
    }
</script>