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
                        <h3 class="card-title" style="display: inline-block;">Income Table</h3>
                        <a class="btn btn-info" href="#" @click="addBook" style="float: right;">Add Income</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                          <tr>
                            <th>User</th>
                            <th>Sum</th>
                            <th>Time</th>
                            <th>Tag</th>
                            <th>Details</th>
                          </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(item,index) in bookInformation">
                              <td>{{item.user_id}}</td>
                              <td>{{item.price}}</td>
                              <td>{{item.created_at}}</td>
                              <td>{{item.tags}}</td>
                              <td>{{item.details}}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- /.card-body -->
                    </div>
              <!-- /.card -->
            </div>
                <!-- /.col-md-6 -->
              <div class="col-12" v-if="manageBook=='create'">
                <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add Income</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">User</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter User" v-model="user_id">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Price</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter price" v-model="price">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Created At</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter created_at" v-model="created_at">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Details</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter details" v-model="details">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Tags</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Tags" v-model="tags">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" @click="submit">Submit</button>
                        <button type="submit" class="btn btn-danger" @click="cancel">Cancel</button>
                        </div>
                        
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer" style="display: none;">
                        
                      </div>
                    
                  </div>                       
                
              </div>
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
            details:"",
            price:"",
            created_at:"",
            updated_at:"",
            tags:""



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
        axios.get('http://jwt.test/api/showincome?token='+this.token)
          .then(function (response) {
            console.log(response);
            if(response.data){
                $this.bookInformation = response.data;
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
      addBook(){
        this.manageBook = 'create';
      },
      cancel(){
        this.manageBook = 'show';
      },
      submit(){
        let $this = this;
        axios.post('http://jwt.test/api/addincome',{
              "id":$this.user_id,
              "details": $this.details,
              "price": $this.price,
              "created_at": $this.created_at,
              "tags": $this.tags,
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
