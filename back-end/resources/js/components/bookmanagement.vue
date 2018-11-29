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
                        <h3 class="card-title" style="display: inline-block;">Book Table</h3>
                        <a class="btn btn-info" href="#" @click="addBook" style="float: right;">Add Book</a>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                          <thead>
                          <tr>
                            <th>Book Name</th>
                            <th>ISBN</th>
                            <th>Author</th>
                            <th>Publish Year</th>
                            <th>Publisher</th>
                            <th>Price($)</th>
                            <th>Quantity</th>
                            <th>Operation</th>
                          </tr>
                          </thead>
                          <tbody>
                            <tr v-for="(item,index) in bookInformation">
                              <td>{{item.bname}}</td>
                              <td>{{item.ISBN}}</td>
                              <td>{{item.author}}</td>
                              <td>{{item.pub_year}}</td>
                              <td>{{item.publisher}}</td>
                              <td>{{item.price}}</td>
                              <td>{{item.quantity}}</td>
                              <td>
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
                      <h3 class="card-title">Add Book</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                      <div class="card-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Book Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" v-model="bname">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">ISBN</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter ISBN" v-model="isbn">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Author</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Author" v-model="author">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Publish Year</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Publish Year" v-model="publishYear">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Publisher</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Publisher" v-model="publisher">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">image url small</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter phone">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">image url middle</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter phone">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">image url large</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter phone">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Quantity</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" v-model="quantity">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Price</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" v-model="price">
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
                          <label for="exampleInputEmail1">Book Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter name" v-model="bname">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">ISBN</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter ISBN" v-model="isbn">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Author</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Author" v-model="author">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Publish Year</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Publish Year" v-model="publishYear">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Publisher</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Publisher" v-model="publisher">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">image url small</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter image url small" v-model="img_s">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">image url middle</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter image url middle" v-model="img_m">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">image url large</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter image url large" v-model="img_l">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Quantity</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Quantity" v-model="quantity">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Price</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Price" v-model="price">
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
            bname:"",
            author:"",
            publishYear:"",
            publisher:"",
            quantity:"",
            price:"",
            isbn:"",
            img_s: "",
            img_m: "",
            img_l: "",
            id:"",
            manageBook:"show",
            reload:true
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
        axios.get('http://jwt.test/api/books?token='+this.token)
          .then(function (response) {
            console.log(response);
            if(response.data){
                $this.bookInformation = response.data.data;
                //console.log($this.bookInformation);
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
    methods:{
      showBook(){
        let $this = this;
        this.reload = false;
        axios.get('http://jwt.test/api/books?token='+this.token)
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
      mangeBook(){

      },
      addBook(){
        this.manageBook = 'create';
      },
      cancel(){
        this.manageBook = 'show';
      },
      submit(){
        let $this = this;
        axios.post('http://jwt.test/api/addbooks',{
              "bname": $this.bname,
              "ISBN": $this.isbn,
              "author": $this.author,
              "role": "0",
              "pub_year": $this.publishYear,
              "publisher": $this.publisher,
              "img_s": "testimg_s",
              "img_m": "testimg_m",
              "img_l": "testimg_l",
              "price": $this.price,
              "quantity": $this.quantity,
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
      updateShow(item){
        let $this = this;
        $this.bname=item.bname;
        $this.author=item.author;
        $this.publishYear=item.pub_year;
        $this.publisher=item.publisher;
        $this.quantity=item.quantity;
        $this.price=item.price;
        $this.isbn=item.ISBN;
        $this.img_s=item.img_s;
        $this.img_m=item.img_m;
        $this.img_l=item.img_m;
        $this.id = item.id;
        $this.manageBook = "update";
      },
      update(){
        let $this = this;
        axios.post('http://jwt.test/api/updatebooks',{
              "id": $this.id,
              "bname": $this.bname,
              "ISBN": $this.isbn,
              "author": $this.author,
              "role": "0",
              "pub_year": $this.publishYear,
              "publisher": $this.publisher,
              "img_s": $this.img_s,
              "img_m": $this.img_m,
              "img_l": $this.img_l,
              "price": $this.price,
              "quantity": $this.quantity,
              "token": $this.token
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
        axios.post('http://jwt.test/api/deletebooks',{
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
