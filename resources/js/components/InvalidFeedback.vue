<template>
    <div v-show="message">
        <p class="mt-1 text-sm text-danger">
            {{ message }}
        </p>
    </div>
</template>

<script>
    export default {
        props: ['message']
    }
</script>