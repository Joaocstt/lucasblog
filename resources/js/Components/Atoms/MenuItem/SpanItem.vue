<template>
    <span class="ml-4">{{ description }}</span>
</template>

<script setup>
    const props = defineProps({
       description: {
           type: String,
           required: true,
       }
    });
</script>
