<template lang="jade">
	div
		Header
		div.container
			div.cart-row
				div.block-header
					h4 My Cart
				div.order-list-panel
					div.order-panel
						table.cart-table
							tr
								td Book Name
								td Price
								td.format Format
								td.quantity Quantity
							tr
								td.book-name
									a Head First JavaScript
								td 109
								td.format mobi
								td.quantity
									input(value="1")
					div.address.order-operation
						h5 Address
						div.address-content
							div.pull-right
								a.form-link(@click="vm.showDialog=true") change

							div.default-address
								table.cart-table
									tr.thead
										td Name
										td Region
										td City
										td Street Address
										td Phone Number
									tr
										td {{address.name}}
										td {{address.region}}
										td {{address.city}}
										td {{address.address}}
										td {{address.phone}}
					div.order.order-operation
						h5 Order
		Dialog(@closeDialog="close" v-if="vm.showDialog" @address="showAddress") 
						

</template>
<script>
	import Header from '../components/header'
	import Dialog from '../components/dialog'
	export default {
		data () {
			return {
				 vm: {
	              showDialog: false,
	            },
	            address:{} 
			}
		},
		components: {
			Header,
			Dialog
		},
		methods:{
			close(){
	          	this.vm.showDialog = false;
	        },
	        showAddress(address){
	        	this.address = address;
	        }
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
			    h4{
			    	font-size: 24px;
			    }
	    	}
	    	.order-list-panel{
	    		zoom: 1;
	    		.order-panel{
	    			box-sizing: border-box;
	    			.cart-table{
	    				width: 100%;
	    				border-collapse: collapse;
	    				border: 1px solid $Greyunderline;
	    				tr{
	    					border: 1px solid $Greyunderline;
	    					td{
	    						height: 40px;
    							line-height: 40px;			
	    					}
	    					.format{
	    						width: 10%;
	    					}
	    					.quantity{
	    						width: 10%;
	    						text-align: center;
	    					}
	    					input{
	    						display: inline-block;
	    						text-align: center;
	    						width: 15px;
	    						height: 15px;
	    						line-height: 15px;
	    						outline: none;
	    					}
	    				}
	    				
	    			}
	    			
	    		}
	    		.order-operation{
	    			position: relative;
	    				h5{
	    					font-size: 17px;
	    					background: none;
						    border: none;
						    padding: 0;
						    height: auto;
						    margin: 30px 0 6px 0;
						    border-bottom: 1px solid $Greyunderline;	
	    				}
	    		}
	    		.address{
	    			.pull-right{
	    				float: right;
	    				.form-link{
	    					color: $titleBlue;
	    					cursor: pointer;
	    				}
	    			}
	    			.default-address{
	    				 box-sizing: border-box;
	    				.cart-table{
	    					 width: 100%;
	    					 border: 1px solid $Greyunderline;
	    					 border-collapse: collapse;
	    					.thead{
	    						background:$backgroundGrey;
	    					}
	    					tr{
	    						td{
	    							height: 40px;
    								line-height: 40px;
	    						}
	    					}
	    				}
	    			}
	    		}
	    	}

	    }
	}
</style>