<template>
<div>
	<Header></Header>
	<Container></Container>
</div>
	
</template>
<script>
	import Header from '../components/header'
	import Container from '../components/container'
	export default {
  data () {
      return {
          items: []   /* 定义一个空数组数据items */
      }
  },
  components: {
    Header,
    Container
  }
 } 
</script>
<style>
</style>