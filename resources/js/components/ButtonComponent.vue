<template>
    <button
        :type="type"
        :class="[
            'btn',
            variants[variant],
        ]"
    >
        <slot />
    </button>
</template>

<script setup>
    defineProps({
        type: {
            type: String,
            default: 'button'
        },
        variant: {
            type: String,
            default: 'primary',
            validator: (value) => ['primary', 'secondary', 'danger'].includes(value)
        },
    });

    const variants = {
        'primary' : 'btn-primary',
        'secondary' : 'btn-secondary',
        'danger' : 'btn-danger',
    };
</script>