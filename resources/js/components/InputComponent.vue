<template>
    <label
        :for="for"
        :class="['form-label']"
    >
        <slot />
    </label><br>
    <input
        :type="type"
        :class="['form-control']"
        :name="name"
        :id="id"
        :value="value"
    ><br>
</template>

<script setup>
    defineProps({
        for: {
            type : String,
            default : 'name'
        },
        type: {
            type : String,
            default : 'text'
        },
        name: {
            type : String,
            default : 'name'
        },
        id: {
            type : String,
            default : 'name'
        },
        value: {
            type : String,
            default : ''
        },
    });
</script>