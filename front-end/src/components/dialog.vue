<template lang="jade">
  div#dialog
    div.background
      div.modal-header
        button.close(@click="closeDialog")
          span ×
        h4.modal-title address
      div.modal-body
        div.row
          div.column 这是一段信息
          div.column.right
            h5 Add
            div.address-form
              div.form-group
                label full name
                input.form-control
              div.form-group
                label Street address
                input.form-control
              div.form-group
                label City
                input.form-control
              div.form-group
                label Region
                input.form-control
              div.form-group
                label Phone number
                input.form-control
              
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
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%,-50%);
      min-width: 860px;
      -webkit-box-shadow: 0 5px 15px rgba(0,0,0,.5);
      box-shadow: 0 5px 15px rgba(0,0,0,.5);
      .modal-header{
          padding: 15px;
          border-bottom: 1px solid $Greyunderline;
          h4{
            margin: 0;
            line-height: 1.42857143;
            text-align: left;
          }
          .close{
            width: 20px;
            height: 20px;
            float: right;
            cursor: pointer;
            background-size: cover;
            background-repeat: no-repeat;
            font-size: 21px;
            font-weight: 700;
            line-height: 1;
            text-shadow: 0 1px 0 $White;
            filter: alpha(opacity=20);
            opacity: .2;
            border:none;
        }
      }
      .modal-body{
        max-width: 860px;
        .row{
          .column{
            display: inline-block;
            width: 47%;
            padding: 0 20px 0 0;
          }
          .right{
              h5{
                font-size: 18px;
                line-height: 1.4;
                margin: 0;
                font-weight: 500;
                min-height: 36px;
                color: $Grepbright;
                border-bottom: 1px solid $Grey;
                padding: 12px 0 0 0;
                text-align: left;
              }
              .address-form{
                .form-group{
                      margin-bottom: 15px;
                      margin-top: 20px;
                    label{
                      display: inline-block;
                      width: 100px;
                      padding-top: 7px;
                      padding-right: 20px;
                      margin-bottom: 0;
                      text-align: right;

                    }
                    .form-control{
                      display: inline-block;
                      width: 230px;
                      height: 24px;
                      padding: 6px 12px;
                      font-size: 14px;
                      line-height: 1.42857143;
                      color: $Grey;
                      background-color: $White;
                      background-image: none;
                      border: 1px solid $Greyunderline;
                      border-radius: 4px;
                      -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                      box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
                      -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
                      -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                      transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
                      outline: none;
                    }
                }
              }
          }
        }
      }
    }
  }
</style>