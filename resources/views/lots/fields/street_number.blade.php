<v-input-group
        id="street_number"
        label="Street Number"
        :helpers="methods.charCount('street_number')"
        :errors="methods.getErrors('street_number')">

    <input id="street_number"
           type="text"
           class="form-control"
           :class="{ 'is-invalid': methods.hasErrors('street_number') }"
           v-model="data.form.street_number"
           @input="methods.clearErrors"
           placeholder="Street number">
</v-input-group>