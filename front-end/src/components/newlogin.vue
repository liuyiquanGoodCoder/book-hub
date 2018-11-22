<template lang="jade">
	div.login_container
		div.container
			div.logo
				router-link(to="/") Cracker
			h1 登入
			div.message 使用您的Cracker账号
			div.user_information
				div.user_title 电子邮件地址
				input.user_email
				div.underline
				div.user_title 输入您的密码
				input.user_password(type="password")
				div.underline
				div.user_confirm
					router-link(to="/register",class="register") 创建账号
					div.login 登陆
</template>
<script>
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
			    	}
			    }
			}
	    }
	}
</style>