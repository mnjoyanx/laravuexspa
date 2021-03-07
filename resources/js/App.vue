<template>
    <div>
        <navigation />
        <div class="container">
            <router-view />
        </div>
    </div>
</template>

<script>
import Navigation from './components/Navigation.vue'
    export default {
        name: 'app',
        components: {
            Navigation
        }
    }
</script>

<style>
    @import url('../../node_modules/bootstrap/dist/css/bootstrap.min');
</style>
