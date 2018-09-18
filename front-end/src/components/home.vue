<template>
<div>
		<div class="hmtop">
			<Header></Header>
			

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
	import Header from '../components/header'
	export default {
  data () {
      return {
          items: []   /* 定义一个空数组数据items */
      }
  },
  components: {
    Banner,
    Menu,
    Header
  }
 } 
</script>
<style>
	@import url("../AmazeUI-2.4.2/assets/css/amazeui.css");
	@import url("../AmazeUI-2.4.2/assets/css/admin.css");
	@import url("../basic/css/demo.css");
	@import url("../css/hmstyle.css");
</style>