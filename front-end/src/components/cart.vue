<template lang="jade">
	div
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
							tr(v-for="(item,index) in cartList")
								td.book-name
									a {{item.bname}}
								td ${{item.price}}
								td.format paper
								td.quantity
									input(v-bind:value="item.quantity")
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
										td {{address.receiver}}
										td {{address.countrycode}}
										td {{address.citycode}}
										td {{address.addline1}}
										td {{address.phonenum}}
					div.order.order-operation
						h5 Order
						div 
							span Subtotal:
							span ${{subtotal}}
						div 
							button(@click="order") Confirm
							a(href="#/") Select
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
	            address:{},
	            cartList:{},
	            token:"",
	            subtotal:0,
	            cookie:document.cookie
			}
		},
		mounted(){
			let $this = this;
			let userInfo = document.cookie.split("|");
		 	    this.token = userInfo[1];
			axios.get("http://jwt.test/api/showcarts?token="+this.token).then(function (response) {
				    if(response.status == 200){
				    	$this.cartList = response.data;
				    	for(var i=0,j=$this.cartList.length;i<j;i++){
				    		$this.subtotal = $this.subtotal+$this.cartList[i].price*$this.cartList[i].quantity;
				    	}
				    }
				  })
				  .catch(function (error) {
				    console.log(error);
			});
			axios.get("http://jwt.test/api/showaddresses?token="+this.token).then(function (response) {
				    if(response.status == 200){
				    	//
				    	$this.address = response.data[0];
				    }
				  })
				  .catch(function (error) {
				    console.log(error);
			});

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
	        },
	        order(){
	        	let orders = [];
	        	let userInfo = this.cookie.split("|");
		 	    let token = userInfo[1];
	        	for(var i=0,j=this.cartList.length;i<j;i++){
	        		let orderItem = {};
	        		orderItem.bid = this.cartList[i].bid;
	        		orderItem.quantity = this.cartList[i].quantity;
	        		orderItem.price = this.cartList[i].price;
	        		orderItem.address_id  = this.address.id;
	        		orders.push(orderItem);

	        	}
	        	console.log(orders);
	        	axios.post("http://jwt.test/api/orderbooks", {
				    orders: orders,
				    token: token
				  })
				  .then(function (response) {
				    console.log(response);
				    if(response.data.success == false){
				    	//
				    }else if(response.data.success == true){
				    	alert("success");
				    	this.$emit('showHome',true);
				    }
				  })
				  .catch(function (error) {
				    console.log(error);
				});
	        }
		},
		watch:{
			cartList:function() {
				for(var i=0,j=this.cartList.length;i<j;i++){
				    		this.subtotal = this.subtotal+this.cartList[i].price*this.cartList[i].quantity;
				 }
			},
			immediate: true,
			//need change
			//deep:true
		}
}

</script>
<style lang="scss" scoped>
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
	    		.order{
	    			div{
	    				height: 50px;
    					line-height: 50px;
    					text-align: right;
	    				button{
	    					outline: none;
	    					box-sizing: border-box;
						    display: inline-block;
						    padding: 0 30px;
						    height: 40px;
						    line-height: 40px;
						    min-width: 80px;
						    background-color: $Bluesky;
						    color: $White;
						    font-family: Proxima Nova,helvetica neue,helvetica,arial,sans-serif;
						    font-weight: 600;
						    font-size: 16px;
						    text-align: center;
						    text-decoration: none;
						    -webkit-transition: all .15s ease-in-out;
						    transition: all .15s ease-in-out;
						    border-radius: 3px;
						    border: none;
						    cursor: pointer;
						    margin-right: 20px;
	    				}
	    				a{
	    					outline: none;
	    					box-sizing: border-box;
						    display: inline-block;
						    padding: 0 30px;
						    height: 40px;
						    line-height: 40px;
						    min-width: 80px;
						    background-color: $White;
						    color: $Bluesky;
						    font-family: Proxima Nova,helvetica neue,helvetica,arial,sans-serif;
						    font-weight: 600;
						    font-size: 16px;
						    text-align: center;
						    text-decoration: none;
						    -webkit-transition: all .15s ease-in-out;
						    transition: all .15s ease-in-out;
						    border-radius: 3px;
						    cursor: pointer;
						    border:1px solid $Greyunderline;
	    				}
	    			}
	    		}
	    	}

	    }
	}
</style>