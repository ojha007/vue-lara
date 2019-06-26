<template>
    <div  class="darken-1">
        <Navbar/>
        <router-view></router-view>
    </div>
</template>

<script>
    import Navbar from "../../layouts/Navbar";
    import Footer from "../../layouts/Footer";


    export default {
        components: {
            Navbar,
            Footer,
        }
    }
</script>
