<template>
<div>
	<Header></Header>
	<Container v-if="show_container"></Container>
  <Product v-if="show_product"></Product>
</div>
	
</template>
<script>
	import Container from '../components/container'
  import Header from '../components/header'
  import Product from '../components/product'
  export default {
  data () {
      return {
          show_container:true,
          show_product:false
      }
  },
  components: {
    Header,
    Container,
    Product,
  }
 } 
</script>
<style>
</style>