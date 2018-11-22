<template>
    <div>
        <button v-if="!form" class="btn btn-primary">Add Land Details</button>
        <template v-else>
            <div class="row">
                <div class="col-6">
                    <div class="form-group row">
                        <label for="lot_area" class="col-6 col-form-label text-right">Lot Area</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="lot_area" id="lot_area">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="street_number" class="col-6 col-form-label text-right">Street Number</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="street_number" id="street_number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="street" class="col-6 col-form-label text-right">Street</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="street" id="street">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="suburb" class="col-6 col-form-label text-right">Suburb</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="suburb" id="suburb">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="postcode" class="col-6 col-form-label text-right">Postcode</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="postcode" id="postcode">
                        </div>
                    </div>

                </div>
                <div class="col-6">
                    <div class="form-group row">
                        <label for="registered_plan" class="col-6 col-form-label text-right">Registered Plan Date</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="registered_plan" id="registered_plan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subdivided_rpsp" class="col-6 col-form-label text-right">RP / SP</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="subdivided_rpsp" id="subdivided_rpsp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subdivided_county" class="col-6 col-form-label text-right">County</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="subdivided_county" id="subdivided_county">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="subdivided_parish" class="col-6 col-form-label text-right">Parish</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="subdivided_parish" id="subdivided_parish">
                        </div>
                    </div>


                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-group row pt-4">
                        <label for="original_lot_number" class="col-6 col-form-label text-right">Original Lot Number</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="original_lot_number" id="original_lot_number">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="original_rpsp" class="col-6 col-form-label text-right">Original RP / SP</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="original_rpsp" id="original_rpsp">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="original_country" class="col-6 col-form-label text-right">Original Country</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="original_country" id="original_country">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="original_parish" class="col-6 col-form-label text-right">Original Parish</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="original_parish" id="original_parish">
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group row pt-4">
                        <label for="reconfigured_lot_number" class="col-6 col-form-label text-right">Reconfigured Lot Number</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="reconfigured_lot_number" id="reconfigured_lot_number">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="reconfigured_rpsp" class="col-6 col-form-label text-right">Reconfigured RP / SP</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="reconfigured_rpsp" id="reconfigured_rpsp">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="reconfigured_county" class="col-6 col-form-label text-right">Reconfigured County</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="reconfigured_county" id="reconfigured_county">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="reconfigured_parish" class="col-6 col-form-label text-right">Reconfigured Parish</label>
                        <div class="col-6">
                            <input type="text" class="form-control" name="reconfigured_parish" id="reconfigured_parish">
                        </div>
                    </div>
                </div>
            </div>
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
                form: []
            }
        },
        mounted() {
            this.fetch();
        },
        methods: {
            fetch() {
                axios.get('/api/lots/' + this.lot + '/land-detail').then(({data}) => {
                    this.form = data;
                });
            }
        }
    }
</script>