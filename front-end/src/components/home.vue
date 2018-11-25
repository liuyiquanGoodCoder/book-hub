<template>
<div>
	<Header></Header>
	<Container v-if="show_container" @bname="showProduct"></Container>
  <Product v-if="show_product" v-bind:productName = "bookname"></Product>
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
          show_product:false,
          bookname:""
      }
  },
  components: {
    Header,
    Container,
    Product,
  },
  methods:{
    showProduct(bname){
      this.bookname = bname;
      this.show_container=false;
      this.show_product=true;
    }
  }
 } 
</script>
<style>
</style>