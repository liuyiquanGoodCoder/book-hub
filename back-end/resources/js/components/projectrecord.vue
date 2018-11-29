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
                        <h3 class="card-title" style="display: inline-block;">Project Table</h3>
                        <a class="btn btn-info" href="#" @click="addBook" style="float: right;">Add Record</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                          <tr>
                            <th>id</th>
                            <th>Seller Id</th>
                            <th>Project Id</th>
                            <th>Price($)</th>
                            <th>Created Time</th>
                            <th>Details</th>
                            <th style="text-align: center;">Operation</th>
                          </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(item,index) in bookInformation">
                              <td>{{item.id}}</td>
                              <td>{{item.from_seller_id}}</td>
                              <td>{{item.project_id}}</td>
                              <td>{{item.price}}</td>
                              <td>{{item.created_at}}</td>
                              <td>{{item.details}}</td>
                              <td style="text-align: center;">
                                <div class="btn-group">
                                  <a class="btn btn-info" href="#" @click="updateShow(item)">Manage</a>
                                  <a class="btn btn-danger" href="#" @click="deleteBook(item.id)">Delete</a>
                                </div>
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
              <div class="col-12" v-if="manageBook=='create'">
                <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Add Record</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Project Id</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Project Id" v-model="project_id">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Seller Id</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Seller Id" v-model="from_seller_id">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Price</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter price" v-model="price">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Details</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter details" v-model="details">
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
              <div class="col-lg-6" v-if="manageBook=='update'">
                <!-- general form elements -->
                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Update Book</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Seller Id</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Seller Id" v-model="from_seller_id">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Price</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter price" v-model="price">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Details</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter details" v-model="details">
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-primary" @click="update">Submit</button>
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
            from_seller_id:"",
            details:"",
            price:"",
            project_id:"",
            created_at: "",
            updated_at: "",
            status:""
            
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
        $this.id = "";
        $this.user_id="";
        $this.from_seller_id="";
        $this.details="";
        $this.price="";
        $this.project_id="";
        $this.status="";
        $this.created_at="";
        $this.updated_at="";
        axios.get('http://jwt.test/api/showrecord?token='+this.token)
          .then(function (response) {
            console.log(response);
            if(response.data){
                $this.bookInformation = response.data;
                //$this.project_id = response.data[0].project_id;
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
      mangeBook(){

      },
      addBook(){
        this.manageBook = 'create';
      },
      cancel(){
        this.manageBook = 'show';
        this.showBook();
      },
      submit(){
        let $this = this;
        axios.post('http://jwt.test/api/addrecord',{
                project_id:$this.project_id,
                from_seller_id:$this.from_seller_id,
                price:$this.price,
                details:$this.details,
                token:$this.token
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
      },
      updateShow(item){
        let $this = this;
        $this.id = item.id;
        $this.from_seller_id = item.from_seller_id;
        $this.details = item.details;
        $this.price =item.price;
        $this.project_id = item.project_id;
        $this.manageBook = "update";
      },
      update(){
        let $this = this;
        axios.post('http://jwt.test/api/updaterecord',{
                id:$this.id,
                from_seller_id:$this.from_seller_id,
                details:$this.details,
                price:$this.price,
                project_id:$this.project_id,
                token : $this.token
          })
          .then(function (response) {
            if(response.status != '200'){
              
            }else if(response.data.success == true){
                $this.manageBook = "show";
                $this.showBook();              
            }
          })
          .catch(function (error) {
            console.log(error);
        });
      },
      deleteBook(id){
        let $this = this;
        axios.post('http://jwt.test/api/delete_projects',{
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
      },


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
