<template>
    <div class="card text-center w-100 h-100 p-3" >
        <p class="h3">{{ title }}</p>
        <p class="h3">{{ count }}</p>
        <p class="h3 ">Orang</p>
    </div>
</template>

<script setup>
    defineProps({
        title: {
            type: String,
            default: ''
        },
        count: {
            type: Number,
            default: 0
        },
    });
</script>