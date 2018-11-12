<template lang="jade">
  div#dialog
    div.background
      div.closeImg(@click="closeDialog") close
      span.content 这是一段信息
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
 
<style lang="scss">
  #dialog{
    position: fixed;
    top: 0;
    left: 0;
    background: rgba(0,0,0,0.3);
    width: 100%;
    height: 100%;
    .background{
      text-align: center;
      background-color: $White;
      border-radius: 20px;
      width: 50%;
      height: 50%;
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
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
      .content{
        text-align: center;
        position: absolute;
        top: 50%;
      }
    }
  }
</style>