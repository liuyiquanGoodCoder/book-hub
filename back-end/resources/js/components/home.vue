<template>
	<div class="wrapper">
    	<Sidebar></Sidebar>
    	<Storeinformation></Storeinformation>
    </div>
</template>

<script>
    import Sidebar from '../components/sidebar'
    import Storeinformation from '../components/storeinformation'
export default {
    data() {
        return {
            
        }
    },
    components: {
        Sidebar,
        Storeinformation,
    }
}
</script>

<style>
</style>
