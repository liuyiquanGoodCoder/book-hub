<template>
	<div>
		<Header></Header>
	</div>
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
<style>
	@import url("../AmazeUI-2.4.2/assets/css/amazeui.css");
	@import url("../AmazeUI-2.4.2/assets/css/admin.css");
	@import url("../basic/css/demo.css");
</style>