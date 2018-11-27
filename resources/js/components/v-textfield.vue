<template>
    <div class="form-group row">
        <label :for="name"
               class="col-6 col-form-label text-right" v-text="computedLabel"></label>
        <div class="col-6">
            <input type="text"
                   class="form-control"
                   :class="{'is-invalid': form.errors.has(name)}"
                   :name="name"
                   :id="name"
                   v-model="form[name]">
            <div v-if="form.errors.has(name)" class="invalid-feedback"
                 v-text="form.errors.get(name)"></div>
        </div>
    </div>
</template>
<script>
    import Titleize from './mixins/Titleize';
    export default {
        mixins: [Titleize],
        props:['form', 'name', 'label'],
        computed: {
            computedLabel() {
                return this.label || this.titleize(this.name);
            }
        }
    }
</script>