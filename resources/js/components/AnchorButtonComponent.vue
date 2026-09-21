<template>
    <a
        :href="href"
        :class="[
            'btn',
            variants[variant],
        ]"
    >
        <slot />
    </a>
</template>

<script setup>
    defineProps({
        href: {
            type: String,
            default: '#'
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