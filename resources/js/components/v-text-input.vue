<template slot-scope="{data,methods}">
        <v-input-group
                :id="id"
                :label="label"
                :helpers="methods.charCount(id)"
                :errors="methods.getErrors(id)">

            <input :id="id"
                   type="text"
                   class="form-control"
                   :class="{ 'is-invalid': methods.hasErrors(id) }"
                   v-model="data.form[id]"
                   @input="methods.clearErrors"
                   :placeholder="placeholder">
        </v-input-group>
</template>
<script>
    export default {
        props: ['id', 'label', 'placeholder']
    }
</script>