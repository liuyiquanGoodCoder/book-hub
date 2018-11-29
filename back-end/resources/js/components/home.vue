<template>
	<div class="wrapper">
    	<Sidebar @url="showContent"></Sidebar>
    	<Storeinformation v-if="content=='store'"></Storeinformation>
    	<Bookinformation v-if="content=='book'"></Bookinformation>
    </div>
</template>

<script>
    import Sidebar from '../components/sidebar'
    import Storeinformation from '../components/storeinformation'
    import Bookinformation from '../components/bookmanagement'
export default {
    data() {
        return {
            content:'store',
        }
    },
    components: {
        Sidebar,
        Storeinformation,
        Bookinformation
    },
    mounted(){
    	
    },
    methods:{
    	showContent(url){
    		this.content = url;
    	}
    }
}
</script>

<style>
</style>
