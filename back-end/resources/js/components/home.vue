<template>
	<div class="wrapper">
    	<Sidebar @url="showContent"></Sidebar>
    	<Storeinformation v-if="content=='store'"></Storeinformation>
    	<Bookinformation v-if="content=='book'"></Bookinformation>
    	<Sellerservice v-if="content=='service'"></Sellerservice>
    	<Sellerbusiness v-if="content=='sellerbusiness'"></Sellerbusiness>
    </div>
</template>

<script>
    import Sidebar from '../components/sidebar'
    import Storeinformation from '../components/storeinformation'
    import Bookinformation from '../components/bookmanagement'
    import Sellerservice from '../components/sellerservice'
    import Sellerbusiness from '../components/sellerbusiness'
export default {
    data() {
        return {
            content:'store',
        }
    },
    components: {
        Sidebar,
        Storeinformation,
        Bookinformation,
        Sellerservice,
        Sellerbusiness
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
