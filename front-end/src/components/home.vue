<template>
<div>
	<Header></Header>
	<Container></Container>
</div>
	
</template>
<script>
	import Container from '../components/container'
  import Header from '../components/header'
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