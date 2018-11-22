<div class="form-group row">
    <label for="development" class="col-2 col-form-label text-right">Development</label>
    <div class="col-3">
        <select class="form-control" name="development">
            <option>Bellmere</option>
            <option>Cherrybook</option>
            <option>Riverparks</option>
            <option>Springbrook</option>
            <option>The Outlook</option>
            <option>The Parks</option>
            <option>The Pocket</option>
            <option>Vistas North</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="stage" class="col-2 col-form-label text-right">Stage</label>
    <div class="col-3">
        <select id="stage" name="stage" class="form-control">
            <option>Stage 1</option>
            <option>Stage 2</option>
            <option>Stage 3</option>
            <option>Stage 4</option>
            <option>Stage 5</option>
            <option>Stage 6</option>
            <option>Stage 7</option>
            <option>Stage 8</option>
            <option>Stage 9</option>
            <option>Stage 10</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="lot" class="col-2 col-form-label text-right">Lot</label>
    <div class="col-3">
        <select id="lot" name="lot" class="form-control">
            <option>Lot 101</option>
            <option>Lot 102</option>
            <option>Lot 103</option>
            <option>Lot 104</option>
            <option>Lot 105</option>
            <option>Lot 106</option>
            <option>Lot 107</option>
            <option>Lot 108</option>
            <option>Lot 109</option>
        </select>
    </div>
</div>

<v-tabs
        :tabs="[{
        name: 'Land Details',
        hash: 'land-details',
        icon: 'fa-home',
        error: methods.hasErrorsIn(
            'lot_area', 'street_number', 'street', 'suburb',
            'postcode', 'subdivided_rpsp', 'subdivided_country',
            'subdivided_parish', 'original_lot_number', 'original_rpsp',
            'original_country', 'original_parish', 'reconfigured_lot_number',
            'reconfigured_rpsp', 'reconfigured_country',
            'reconfigured_parish')
    }, {
        name: 'Sale Contracts',
        hash: 'sale-contracts',
        icon: 'fa-file-contract'
    }, {
        name: 'Building Plans',
        hash: 'building-plans',
        icon: 'fa-building'
    }]">

    <template slot="land-details">
        <div class="row">
            <div class="col-6">
                {{--@include('lots.fields.lot_area')--}}
                {{--@include('lots.fields.street_number')--}}
                {{--@include('lots.fields.street')--}}
                {{--@include('lots.fields.suburb')--}}
            </div>
            <div class="col-6">

            </div>
        </div>
    </template>
    <template slot="sale-contracts">

    </template>
    <template slot="building-plans">

    </template>
</v-tabs>


