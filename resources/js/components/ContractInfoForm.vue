<template>
    <div class="card">
        <div class="card-header">Contract Info</div>
        <div class="card-body">

            <!--Development-->
            <div class="form-group row">
                <label for="development_id" class="col-2 col-form-label text-right">Development</label>
                <div class="col-4">
                    <select
                            id="development_id"
                            name="development_id"
                            class="form-control"
                            v-model="form.development_id"
                            @change="getStages()">
                        <option v-for="development in developments" :value="development.id">
                            {{development.development}}
                        </option>
                    </select>
                </div>
            </div>

            <!--Stage-->
            <div class="form-group row">
                <label for="stage_id" class="col-2 col-form-label text-right">Stage</label>
                <div class="col-4">
                    <select :disabled="! stages.length"
                            id="stage_id"
                            name="stage_id"
                            class="form-control"
                            v-model="form.stage_id"
                            @change="getLots()">
                        <option v-for="stage in stages" :value="stage.id">
                            {{stage.stage}}
                        </option>
                    </select>
                </div>
            </div>

            <!--Lots-->
            <div class="form-group row">
                <label for="lot_id" class="col-2 col-form-label text-right">Lot</label>
                <div class="col-4">
                    <select :disabled="! lots.length"
                            id="lot_id"
                            name="lot_id"
                            class="form-control"
                            v-model="form.lot_id"
                            @change="getLots()">
                        <option v-for="lot in lots" :value="lot.id">
                            {{lot.lot_number}}
                        </option>
                    </select>
                </div>
            </div>

            <v-tabs v-if="form.lot_id"
                    :tabs="[
        {
            name:'Land Details',
            hash:'land-details',
            icon: 'fa-edit',
        },{
            name:'Sale Contracts',
            hash:'sale-contracts',
            icon: 'fa-edit',
        },{
            name:'Builders Terms',
            hash:'builders-terms',
            icon: 'fa-edit',
        },{
            name:'Building Plans',
            hash:'building-plans',
            icon: 'fa-edit',
        }]">
                <template slot="land-details">
                    <div class="card-body">
                        <land-details :lot="form.lot_id"></land-details>
                    </div>
                </template>
                <template slot="sale-contracts">

                </template>
                <template slot="builders-terms">

                </template>
                <template slot="building-plans">

                </template>
            </v-tabs>
        </div>
        <div class="card-footer">

        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                form: {},
                developments: [],
                stages: [],
                lots: []
            }
        },
        mounted() {
            axios.get('/api/developments').then(({data}) => {
                this.developments = data;
            });
        },
        methods: {
            getStages() {
                if (this.form.development_id) {
                    axios.get('/api/developments/' + this.form.development_id + '/stages').then(({data}) => {
                        this.stages = data;
                    });
                }
            },
            getLots() {
                if (this.form.stage_id) {
                    axios.get('/api/stages/' + this.form.stage_id + '/lots').then(({data}) => {
                            this.lots = data;
                    });
                }
            }
        }
    }
</script>