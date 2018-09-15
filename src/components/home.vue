<template>
<div>
		<div class="hmtop">
			<div class="am-container header">
				<ul class="message-l">
					<div class="topMessage">
						<div class="menu-hd">
							<a href="#" target="_top" class="h">亲，请登录</a>
							<a href="#" target="_top">免费注册</a>
						</div>
					</div>
				</ul>
				<ul class="message-r">
					<div class="topMessage home">
						<div class="menu-hd">
							<a href="#" target="_top" class="h">商城首页</a>
						</div>
					</div>
					<div class="topMessage my-shangcheng">
						<div class="menu-hd MyShangcheng">
							<a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
						</div>
					</div>
					<div class="topMessage mini-cart">
						<div class="menu-hd">
							<a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a>
						</div>
					</div>
					<div class="topMessage favorite">
						<div class="menu-hd">
							<a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a>
						</div>
					</div>
				</ul>
			</div>
			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="../images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="../images/logobig.png" /></li>
				</div>

				<div class="search-bar pr">
					<a name="index_none_header_sysc" href="#"></a>
					<form>
						<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
						<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
					</form>
				</div>
			</div>

			<div class="clear"></div>

		</div>
		<b class="line"></b>
		<div class="shopNav">
			<div class="slideall" style="height: auto;">
				<div class="long-title"><span class="all-goods">全部分类</span></div>
				<div class="nav-cont">
					<ul>
						<li class="index">
							<a href="#">首页</a>
						</li>
						<li class="qc">
							<a href="#">闪购</a>
						</li>
						<li class="qc">
							<a href="#">限时抢</a>
						</li>
						<li class="qc">
							<a href="#">团购</a>
						</li>
						<li class="qc last">
							<a href="#">大包装</a>
						</li>
					</ul>
					<div class="nav-extra">
						<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
					</div>
				</div>
				<Banner></Banner>
				<Menu></Menu>
			</div>
		</div>

</div>
	
</template>
<script>
	import Banner from '../components/banner'
	import Menu from '../components/menu'
	export default {
  data () {
      return {
          items: []   /* 定义一个空数组数据items */
      }
  },
  components: {
    Banner,
    Menu
  }
}
</script>


<style>
	@import url("../AmazeUI-2.4.2/assets/css/amazeui.css");
	@import url("../AmazeUI-2.4.2/assets/css/admin.css");
	@import url("../basic/css/demo.css");
	@import url("../css/hmstyle.css");
</style>