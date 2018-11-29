<template>
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Starter Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid" >
        <div class="row">
          <div class="col-lg-6" v-if="canCreate=='show'">
            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Store Information</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fa fa-file mr-1"></i> Store Name</strong>

                <p class="text-muted">
                  {{storeName}}
                </p>

                <hr>

                <strong><i class="fa fa-map-marker mr-1"></i> Location</strong>

                <p class="text-muted">
                  {{location}}
                </p>

                <hr>

                <strong><i class="fa fa-envelope mr-1"></i> Email:</strong>

                <p class="text-muted">
                  {{email}}
                </p>

                <hr>

                <strong><i class="fa fa-phone mr-1"></i> Phone Number:</strong>

                <p class="text-muted">
                  {{phoneNumber}}
                </p>

                <hr>

                <strong><i class="fa fa-file-text-o mr-1"></i> Details</strong>

                <p class="text-muted">
                  {{details}}
                </p>
              
                <a class="btn btn-primary btn-block" @click="showupdate" href="#"><b>Update</b></a>
              
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6" v-if="canCreate=='create'">
              <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create Store</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Store Name</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter name" v-model="storeName">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Location</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter location" v-model="location">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" v-model="email">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Phone Number</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" v-model="phoneNumber">
                      </div>
                      <div class="form-group">
                        <label>Textarea</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." v-model="details">
                          
                        </textarea>
                      </div>
                      
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary" @click="submit">Submit</button>
                    </div>
                </div>                       
            
          </div>
          <div class="col-lg-6" v-if="canCreate=='update'">
            
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Store</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Store Name</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter name" v-model="storeName">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Location</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter location" v-model="location">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" v-model="email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Phone Number</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter phone" v-model="phoneNumber">
                  </div>
                  <div class="form-group">
                    <label>Textarea</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." v-model="details">
                      
                    </textarea>
                  </div>
                  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" @click="update">Update</button>
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
            seller:false,
            finance:false,
            marking:false,
            human:false,
            userImage:"",
            token:"",
            canCreate:"show",
            storeName:"",
            location:"",
            email:"",
            phoneNumber:"",
            details:"",
            id:""

        }
    },
    mounted(){
        let userInfo = document.cookie.split(";");
        let userFunction = userInfo[0].split("|");
        let role = userFunction[1];
        let $this = this;
        this.userName = userFunction[0];
        this.token = userFunction[2];
        axios.get('http://jwt.test/api/show_storeinfo?token='+this.token)
          .then(function (response) {
            console.log(response);
            if(response.status != '200'){
              
            }else if(response.status == '200'){
              if(response.data.message[0]){
                let data = response.data.message[0];
                $this.canCreate = 'show';
                $this.storeName = data.sname;
                $this.location = data.address;
                $this.phoneNumber = data.phone_number;
                $this.details = data.details;
                $this.email = data.email;
                $this.id = data.id;

              }else{
                $this.canCreate = 'create'
              }
            }
          })
          .catch(function (error) {
            console.log(error);
        });
    },
    methods:{
      submit(){
        let $this = this;
        axios.post('http://jwt.test/api/create_storeinfo',{
              "sname": $this.storeName,
              "address": $this.location,
              "phone_number": $this.phoneNumber,
              "email": $this.email,
              "details": $this.details,
              "token": $this.token
          })
          .then(function (response) {
            if(response.status != '200'){
              
            }else if(response.data.success == true){
              
                $this.canCreate = 'show';
              
            }
          })
          .catch(function (error) {
            console.log(error);
        });

      },
      showupdate(){
        this.canCreate = 'update';

      },
      update(){
        let $this = this;
        axios.post('http://jwt.test/api/update_storeinfo',{
              "id":$this.id,
              "sname": $this.storeName,
              "address": $this.location,
              "phone_number": $this.phoneNumber,
              "email": $this.email,
              "details": $this.details,
              "token": $this.token
          })
          .then(function (response) {
            if(response.status != '200'){
              
            }else if(response.data.success == true){         
                $this.canCreate = 'show';
              
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
    display: block;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
  }
  strong{
    font-size: 15px;
  }
</style>
