@extends('layouts.app')

@section('content')
    <v-form
            method="POST"
            route="/"
            :schema="{
            lot_area: null,
            street_number: null,
            street: null,
            suburb: null,
            postcode: null,
            subdivided_rpsp: null,
            subdivided_country: null,
            subdivided_parish: null,
            original_lot_number: null,
            original_rpsp: null,
            original_country: null,
            original_parish: null,
            reconfigured_lot_number: null,
            reconfigured_rpsp: null,
            reconfigured_country: null,
            reconfigured_parish: null
        }">
        <template slot-scope="{data, methods}">
            <div class="container">
                <div class="card">
                    <div class="card-header">Contract Information</div>
                    <div class="card-body">
                        @include('lots.form')
                    </div>
                    <div class="card-footer">
                        <button
                                type="button"
                                @click.prevent="methods.submitForm"
                                :disabled="data.isLoading"
                                class="btn btn-success btn-lg mr-2">
                            <i class="fa fa-spinner fa-spin" v-if="data.isLoading"></i>
                            Save
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </v-form>
@endsection