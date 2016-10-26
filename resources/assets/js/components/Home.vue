<template>
    <div>
        <p>Menu</p>
        <router-link :to="{ name: 'calcApp' }"> Calc </router-link>
    </div>
</template>

<script>
    export default {
        name: 'Home',
        mounted() {
            console.log('Component ready.')
        }
    }
</script>
