<template>
	<div class="wrapper">
    	<Sidebar @url="showContent"></Sidebar>
    	<Storeinformation v-if="content=='store'"></Storeinformation>
    	<Bookinformation v-if="content=='book'"></Bookinformation>
    	<Sellerservice v-if="content=='service'"></Sellerservice>
    	<Sellerbusiness v-if="content=='sellerbusiness'"></Sellerbusiness>
    	<Income v-if="content=='income'"></Income>
    	<Expenditure v-if="content=='expenditure'"></Expenditure>
    </div>
</template>

<script>
    import Sidebar from '../components/sidebar'
    import Storeinformation from '../components/storeinformation'
    import Bookinformation from '../components/bookmanagement'
    import Sellerservice from '../components/sellerservice'
    import Sellerbusiness from '../components/sellerbusiness'
    import Income from '../components/income'
    import Expenditure from '../components/expenditure'
    
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
        Sellerbusiness,
        Income,
        Expenditure
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
