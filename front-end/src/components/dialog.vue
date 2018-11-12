<template>
  <div id="dialog">
    <div class="border">
      <div @click="closeDialog" class="closeImg"></div>
      <span class="message">这是一段信息</span>
    </div>
  </div>
</template>
<script>
  export default {
    data(){
      return {}
    },
    methods:{
      closeDialog(){
         //给父组件传参
         this.$emit('closeDialog',false)
      }
    }
  }
</script>
 
<style scoped>
  #dialog{
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(0,0,0,0.3);
    width: 100%;
    height: 100%;
  }
  .message{
    text-align: center;
    position: absolute;
    top: 50%;
  }
  .closeImg{
    width: 20px;
    height: 20px;
    float: right;
    margin-right: 5px;
    margin-top: 5px;
    cursor: pointer;
    background-image: url();
    background-size: cover;
    background-repeat: no-repeat;
  }
  .border{
    text-align: center;
    background-color: white;
    border-radius: 20px;
    width: 50%;
    height: 50%;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
  }
</style>