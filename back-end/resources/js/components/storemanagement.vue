<template>
    <div class="content-wrapper" v-if="reload">
    <!-- Content Header (Page header) -->
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-12" v-if="manageBook=='show'">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title" style="display: inline-block;">Store Table</h3>
                        <!-- <a class="btn btn-info" href="#" @click="addBook" style="float: right;">Add Store</a> -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                          <tr>
                            <th>Store Name</th>
                            <th>Address</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Details</th>
                            <th>Create Time</th>
                            <th>Operation</th>
                          </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(item,index) in bookInformation">
                              <td>{{item.sname}}</td>
                              <td>{{item.address}}</td>
                              <td>{{item.email}}</td>
                              <td>{{item.phone_number}}</td>
                              <td>{{item.details}}</td>
                              <td>{{item.created_at}}</td>
                              <td>
                                <a class="btn btn-danger" href="#" @click="check(item.id)" v-bind:class="[item.status == 0?'':'disabled']">Check</a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
              <!-- /.card -->
            </div>
                <!-- /.col-md-6 -->
          </div>
          <!-- /.col-md-6 -->
            
          
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
</template>

<script>
export default {
    data() {
        return {
            userName:"",
            token:"",
            bookInformation:{},
            manageBook:"show",
            reload:true,
            //
            id:"",
            user_id:"",
            sname:"",
            address:"",
            phone_number:"",
            email:"",
            details:"",



        }
    },
    mounted(){
        let userInfo = document.cookie.split(";");
        //let token = userInfo[0].XSRF-TOKEN;
        let userFunction = {};
        if(userInfo[0].split("|")[2]){
           userFunction = userInfo[0].split("|");
          
        }else{
          userFunction = userInfo[1].split("|");
        }
        let role = userFunction[1];
        let $this = this;
        this.userName = userFunction[0];
        this.token = userFunction[2];
        this.showBook();
    
    },
    methods:{
      showBook(){
        let $this = this;
        this.reload = false;
        axios.get('http://jwt.test/api/uncheckstore?token='+this.token)
          .then(function (response) {
            console.log(response);
            if(response.data){
                $this.bookInformation = response.data.data;
                //console.log($this.bookInformation);
                $this.reload = true;
                $(function () {
                  $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                  });
              });
            }
          })
          .catch(function (error) {
            console.log(error);
        });
      },
      check(id){
        let $this = this;
        axios.post('http://jwt.test/api/checkstore',{
              "id":id,
              "token": $this.token
          })
          .then(function (response) {
           if(response.data.success == true){
                $this.manageBook = "show";
                $this.showBook(); 
            }
          })
          .catch(function (error) {
            console.log(error);
        });
      }


    }

}
</script>

<style scoped>
  a{
    font-size: 15px;
  }
  p{
    font-size: 15px;
  }
  table{
   font-size: 15px; 
  }
</style>
