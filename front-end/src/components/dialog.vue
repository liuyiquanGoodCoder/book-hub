<template lang="jade">
  div#dialog
    div.background
      div.modal-header
        button.close(@click="closeDialog")
          span ×
        h4.modal-title address
      div.modal-body
        div.row
          div.column.left
            div.address-card(v-for="(item,index) in addressItems")
              div.address-header
                div.name {{item.city}}
                div.pull-right
                  a(@click="showDetail(item)") Detail
                  a(@click="useItem(item)") Use 
                  a(@click="changeItem(index)") Change
                  a(@click="deleteItem(index)") Delete
              div.address-detail(v-if="item.show")
                div
                  span.label Full Name:
                  span {{item.name}}
                div 
                  span.label Region:
                  span {{item.region}}
                div
                  span.label City:
                  span {{item.city}}
                div
                  span.label Street Address:
                  span {{item.address}}
                div
                  span.label Phone Number:
                  span {{item.phone}}

          div.column.right
            h5 Add
            div.address-form
              div.form-group
                label Full Name
                input.form-control(v-model="name")
              div.form-group
                label Street Address
                input.form-control(v-model="address")
              div.form-group
                label City
                input.form-control(v-model="city")
              div.form-group
                label Region
                input.form-control(v-model="region")
              div.form-group
                label Phone Number
                input.form-control(v-model="phone")
              div.form-group
                button.btn(@click="add" v-if="add_show") Add
                button.btn(@click="save" v-if="save_show") Save
              
</template>
<script>
  export default {
    data(){
      return {
        addressItems:[],
        name:"",
        address:"",
        city:"",
        region:"",
        phone:"",
        add_show:true,
        save_show:false,
        index:0
      }
    },
    methods:{
      closeDialog(){
         //给父组件传参
         this.$emit('closeDialog',false);
      },
      showDetail(item){
        if(item.show == false){
          item.show = true;
        }else{
          item.show = false;
        }
      },
      add(){
        var item = {};
        item.name = this.name;
        item.address = this.address;
        item.city = this.city;
        item.region = this.region;
        item.phone = this.phone;
        item.show = false;
        this.addressItems.push(item);
        console.log(this.addressItems);

      },
      save(){
        this.addressItems[this.index].name = this.name;
        this.addressItems[this.index].address = this.address;
        this.addressItems[this.index].city = this.city;
        this.addressItems[this.index].region = this.region;
        this.addressItems[this.index].phone = this.phone;
        this.add_show = true;
        this.save_show = false;
      },
      deleteItem(index){
        this.addressItems.splice(index,1);
      },
      changeItem(index){
        this.name = this.addressItems[index].name;
        this.address = this.addressItems[index].address;
        this.city = this.addressItems[index].city;
        this.region = this.addressItems[index].region;
        this.phone = this.addressItems[index].phone;
        this.add_show = false;
        this.save_show = true;
        this.index = index;
      },
      useItem(item){
        //callback address
        this.$emit('address',item);
        this.$emit('closeDialog',false);
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
          text-align: left;
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
            float: left;
            width: 47%;
            padding: 0 20px 0 0;
            height: 100%;
            min-height: 400px;
          }
          .left{
            .address-card{
              border: 1px solid $Greyunderline;
              padding: 10px 20px;
              border-radius: 4px;
              margin: 12px 20px;
              .address-header{
                text-align: left;
                .name{
                    display: inline-block;
                    font-weight: 700;
                }
                .pull-right{
                    float: right;
                    a{
                      display: inline-block;
                      margin-right: 6px;
                      text-align: center;
                      cursor: pointer;
                      color: $BlueButton;
                      -webkit-transition: all,.25s,ease;
                      -khtml-transition: all,.25s,ease;
                      -moz-transition: all,.25s,ease;
                      -ms-transition: all,.25s,ease;
                      -o-transition: all,.25s,ease;
                      text-decoration: none;
                      transition: all,.25s,ease;
                      height: 17px;
                    }

                }
              }
            }
            .address-detail{
              margin-top: 15px;
              div{
                  text-align: left;
                  height: 30px;
                  line-height: 30px; 
                  .label{
                          display: inline-block;
                          color: $Grepbright;
                          width: 110px;
                          text-align: right;
                          margin-right: 20px;
                    }
              }
            }
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
                      position: relative;
                      height: 38px;
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
                    .btn{
                        position: absolute;
                        left: 135px;
                        cursor: pointer;
                        outline: none;
                        display: inline-block;
                        padding: 6px 12px;
                        margin-bottom: 0;
                        font-size: 14px;
                        font-weight: 400;
                        line-height: 1.42857143;
                        text-align: center;
                        white-space: nowrap;
                        vertical-align: middle;
                        -ms-touch-action: manipulation;
                        touch-action: manipulation;
                        cursor: pointer;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                        background-image: none;
                        border: 1px solid transparent;
                        border-radius: 4px;
                        border-color: $Greyunderline;
                        &:hover{
                          background:$Greyunderline;
                        }
                      }
                }
              }
          }
        }
      }
    }
  }
</style>