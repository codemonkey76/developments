<template>
    <div class="form-group">
        <label :for="id" class="font-weight-bold" v-if="label">{{ label }}</label>
        <slot></slot>
        <small v-if="errors && errors.length" class="help-text text-danger">{{ errors[0] }}</small>
        <small class="help-text text-muted">{{ helper ? helper : '&nbsp;' }}</small>
        <slot name="after"></slot>
    </div>
</template>
<script>
export default {
    name: 'v-input-group',
    props: [
        'id',
        'label',
        'errors',
        'helper'
    ]
}
</script>

