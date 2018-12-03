<template lang="jade">
	div
		div.global-nav-view
			div.global-nav-container
				a.flickr-logo-container(@click="showHome") Book Hub
				ul.nav-menu
					//- li 發掘
					//- li 建立
				ul.gn-tools
					li
						router-link(to="/newlogin" v-if="login")	Sign in
					li
						router-link(to="/newregister" class="register" v-if="login") Register
					li
						a(v-if="userName") {{name}}
					li
						a(@click="showCart" v-if="userName")	MyCart
					li
						a( class="register" v-if="userName" @click="signOut") Sign out
			
</template>
<script>
	import login from '../components/newlogin'
	export default {
		data () {
			return {
				userName:false,
				login:true,
				name:"",
				token:"",
				cookie:document.cookie
			}
		},
		components: {
			login
		},
		 mounted() {
		 	//let cookie  = this.cookie.split(";");
				let userInfo = document.cookie.split(";");
		        let userFunction = {};
		        if(userInfo[0].split("|")[2]){
		           userFunction = userInfo[0].split("|");
		          
		        }else{
		          userFunction = userInfo[1].split("|");
		        }
		 	    this.name = userFunction[0];
		 	    this.token = userFunction[1];
			   if(this.token == undefined){
						this.userName = false;
						this.login = true;
					}else{
						this.userName = true;
						this.login = false;
					}
			 	
		 	
		 },
		methods:{
			signOut(){
				 document.cookie = name + '=;  expires=Thu, 01 Jan 1970 00:00:01 GMT;'
				 this.cookie = document.cookie;
			},
			showCart(){
				this.$emit('showCart',true);
			},
			showHome(){
				this.$emit('showHome',true);
			}
			
		},
		watch:{
			cookie:function() {
				if(!document.cookie.split(";")[1]){
					this.userName = false;
					this.login = true;
				}
			}
		}
		
}
</script>
<style lang="scss">
	@import url("../scss/color.scss");
	.global-nav-view{
		width: 100%;
    	height: 50px;
		text-align: left;
		background:$Black;
		.global-nav-container{
			width: 1170px;
			min-width: 800px;
			max-width: 80%;
			height:50px;
			margin-left: auto;
			margin-right: auto;
			padding-left: 130px;
			padding-right: 130px;
			color: $White;
			.flickr-logo-container{
				display: inline-block;
				float: left;
				text-align: left;
				height: 50px;
				line-height: 50px;
				font-size: 24px;
				font-weight: bolder;
				overflow: hidden;
				text-decoration: none;
    			color: $White;
    			cursor: pointer;
			}
			.nav-menu{
				float: left;
			    display: inline-block;
			    margin: 0 0 0 30px;
			    padding: 0;
			    height: 50px;
			    line-height: 50px;
			    list-style: none;
			    display: -webkit-inline-box;
			    display: -webkit-inline-box;
			    display: -ms-inline-box;
			    /* display: flex; */
			    font-size: 18px;
			    li{
			    	margin:0 0 0 20px;
			    }
			}
			.gn-tools{
				float: right;
				display: inline-block;
				margin: 0 0 0 0;
				text-align: left;
				height: 50px;
				line-height: 50px;
				list-style: none;
			    display: -webkit-inline-box;
			    display: -webkit-inline-box;
			    display: -ms-inline-box;
			    /* display: flex; */
			    font-size: 18px;
			    li{
			    	margin-left: 23px;
			    	a{
    					color: $White;
    					text-decoration: none;
    					cursor: pointer;
    					&:hover{
    					  opacity:.7;
    					}
    				}
    				.register{
    					box-sizing: border-box;
					    display: inline-block;
					    padding: 0 20px;
					    height: 32px;
					    line-height: 32px;
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
    				}
			    }
			}
		}
	}
</style>
