<template lang="jade">
	div.login_container
		div.container
			div.logo
				router-link(to="/") Book Hub
			h1 Sign in
			div.message Use Your Book Hub
			div.user_information
				div.user_title Email Address
				input.user_email(v-model="userName")
				div.underline
				div.user_title Password
				input.user_password(type="password" v-model="password")
				div.underline
				div.user_confirm
					router-link(to="/newregister",class="register") Create
					div.login(@click="login") Sign in
</template>
<script>
	import Header from '../components/header'
	export default{
		data(){
			return {
				title:true,
				error:"",
				userName:"",
				password:"",
				
			}
		},
		components: {

		},
		methods: {
			login(){
				const $this = this;
				const url = "http://jwt.test/api/login";
				axios.post(url, {
				    email: $this.userName,
				    password: $this.password
				  })
				  .then(function (response) {
				    console.log(response);
				    if(response.data.success == false){
				    	$this.title = false;
				    	$this.error = "你输入的密码和账户名不匹配，是否忘记密码或忘记会员名";
				    }else if(response.data.success == true){
				    	var userInfo = {};
				    		userInfo.userName = $this.userName.substring(0, $this.userName.indexOf('@'));
				    	    userInfo.token = response.data.token;
				    	document.cookie = name + '=;  expires=Thu, 01 Jan 1970 00:00:01 GMT;'
				    	document.cookie = userInfo.userName +'|' +userInfo.token;
				    	$this.$router.go(-1);
				    }
				  })
				  .catch(function (error) {
				    console.log(error);
				});
			}
		}
	}
</script>
<style lang="scss" scoped>
	.login_container{
		position: absolute;
		display: block;
		min-height: 0;
	    width: 450px;
	    height: 500px;
	    margin: auto;
	    top: 0;
	    left: 0;
	    right: 0;
	    bottom: 0;
		 -webkit-flex-shrink: 0;
	    flex-shrink: 0;
	    background: $White;
	    -webkit-border-radius: 8px;
	    border-radius: 8px;
	    -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
	    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 3px 1px -2px rgba(0,0,0,0.12), 0 1px 5px 0 rgba(0,0,0,0.2);
	    .container{
	    	height: auto;
    		min-height: 416px;
    		-webkit-box-sizing: inherit;
    		box-sizing: inherit;
    		overflow-y: auto;
    		padding: 48px 40px 36px;
    		-webkit-box-flex: 1;
		    box-flex: 1;
		    -webkit-flex-grow: 1;
		    flex-grow: 1;
		    overflow: hidden;
		    text-align: center;
		    .logo{
		    	 text-align: center;
			    font-size: 24px;
			    font-weight: bolder;
			    a{
			    	color:$Black;
			    	text-decoration: none;
			    }
			    
		    }
		    h1{
		    		display:block;
			    	font-size: 23px;
    				margin: 20px 0 5px 0;
			}
			.message{

			}
			.user_information{
				text-align: left;
			    margin-top: 40px;
			    font-size: 14px;
			    .user_title{
			    	margin-top:20px;
			    }
			    .underline{
			    	height: 1px;
    				background: $Greyunderline;
			    }
			    input{
			    	margin-top: 12px;
			    	width: 100%;
			    	border:none;
   					outline:none;
   					font-size:17px;
			    }
			    .user_confirm{
			    	position: relative;
			    	margin-top:50px;
			    	.register{
			    		color: $BlueFont;
					    font-weight: 450;
					    font-size: 16px;
					    height: 36px;
					    line-height: 36px;
					    text-decoration: none;
					}
			    	.login{
			    		float: right;
					    display: inline-block;
					    background:$BlueButton;
					    color: $White;
					    width: 88px;
					    height: 36px;
					    line-height: 36px;
					    border-radius: 5px;
					    text-align: center;
					    font-size: 16px;
					    cursor: pointer;
			    	}
			    }
			}
	    }
	}
</style>