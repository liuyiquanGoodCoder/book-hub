<template lang="jade">
	div
		Header
		div.container
			div.cart-row
				div.block-header
					h4 My Cart
				div.order-lst-panel
					div.order-panel
</template>
<script>
	import Header from '../components/header'
	export default {
		data () {
			return {
				items: []   /* 定义一个空数组数据items */
			}
		},
		components: {
			Header
		}
	}
</script>
<style lang="scss">
.container{
		padding-right: 15px;
	    padding-left: 15px;
	    margin-right: auto;
	    margin-left: auto;
	    width: 1170px;
	    .cart-row{
	    	.block-header{
	    		background: none;
			    border: none;
			    padding: 0;
			    height: auto;
			    margin: 30px 0 6px 0;
			    border-bottom: 1px solid $Greyunderline;
			    position: relative;
	    	}

	    }
	}
</style>