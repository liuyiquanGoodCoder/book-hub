<template>
	<div>
		<div class="login-boxtitle">
			<a href="#"><img alt="" src="../images/logobig.png" /></a>
		</div>
		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="../images/big.jpg" /></div>
				<div class="login-box">
					<div>
						<h3 class="title">{{message}}</h3>
					</div>
					

					<div class="clear"></div>

					<div class="login-form">
						<form  method="post" onsubmit="return false;">
							<div class="user-name">
								<label for="user"><i class="am-icon-user"></i></label>
								<input type="text"  placeholder="邮箱/手机/用户名" v-model="userName">
							</div>
							<div class="user-pass">
								<label for="password"><i class="am-icon-lock"></i></label>
								<input type="password" placeholder="请输入密码" v-model="password">
							</div>
						</form>
					</div>

					<div class="login-links">
						<label for="remember-me"><input  type="checkbox">记住密码</label>
						<a href="#" class="am-fr">忘记密码</a>
						<router-link to="/register" class="zcnext am-fr am-btn-default">注册</router-link>
						<br />
					</div>
					<div class="am-cf">
						<button class="am-btn am-btn-primary am-btn-sm" v-on:click="login">登陆</button>  
					</div>
					<div class="partner">		
						<h3>合作账号</h3>
						<div class="am-btn-group">
							<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
							<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
							<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
						</div>
					</div>	

				</div>
			</div>
		</div>
		<Footer></Footer>
	</div>	
</template>
<script>
	import Footer from "../components/footer"
	import {post} from "../js/httpUtils"
	import Vue from "vue"
	export default{
		data(){
			return {
				message:"登陆商城",
				userName:"",
				password:"",
				
			}
		},
		components: {
			Footer
		},
		methods: {
			login(){
				const error = function (data){
		    		console.log(data);
			    }
			    const success = function (data) {
		    		console.log(data);			    	
			    }	
				const url = "http://jwt.test/api/login";
				const data = {
					"email":this.userName,
					"password":this.password
				};
				post(url,data,success,error);
			}
		}
	}

</script>
<style>
@import url("../AmazeUI-2.4.2/assets/css/amazeui.min.css");
@import url("../css/dlstyle.css");
</style>
