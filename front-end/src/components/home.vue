<template>
<div>
	<Header @showCart="showCart" @showHome="showHome"></Header>
	<Container v-if="show_container" @bname="showProduct"></Container>
  <Product v-if="show_product" v-bind:productName = "bookname" @showCart="showCart" @showHome="showHome"></Product>
  <Cart v-if="show_cart"></Cart>
</div>
	
</template>
<script>
	import Container from '../components/container'
  import Header from '../components/header'
  import Product from '../components/product'
  import Cart from '../components/cart'
  export default {
  data () {
      return {
          show_container:true,
          show_product:false,
          show_cart:false,
          bookname:""
      }
  },
  components: {
    Header,
    Container,
    Product,
    Cart
  },
  methods:{
    showProduct(bname){
      this.bookname = bname;
      this.show_container=false;
      this.show_product=true;
       this.show_cart=false;
    },
    showCart(){
      this.show_container=false;
      this.show_cart=true;
      this.show_product=false;
    },
    showHome(){
      this.show_container=true;
      this.show_cart=false;
      this.show_product=false;
    }
  }
 } 
</script>
<style>
</style>