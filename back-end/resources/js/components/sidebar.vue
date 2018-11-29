<template>
           <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/library.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">MY BookHub</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
           <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Marketing
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
               <li class="nav-item">
                <a href="/storeinfo" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                  Store Management
                  </p>
                </a>
              </li>

             <li class="nav-item">
              <a href="/booksinfo" class="nav-link">
                <i class="nav-icon fa fa-th"></i>
                <p>
                Books Management
                </p>
              </a>
            </li>
               <li class="nav-item">
                <a href="/neworders" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    New Orders
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/expenditure" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Expenditure Records
                  </p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Accounting
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="/myservices" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Services
                  </p>
                </a>
              </li> 
              <li class="nav-item">
                <a href="/income" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Income Records
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/mybusiness" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Business
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/projects" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Marketing Projects
                  </p>
                </a>
              </li> 
               <li class="nav-item">
                <a href="/payroll" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Payroll
                  </p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Human Resource
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              <li class="nav-item">
                <a href="/employeeinfo" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Employee
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/resumes" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Resumes
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/training" class="nav-link">
                  <i class="nav-icon fa fa-th"></i>
                  <p>
                    Training
                  </p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-th"></i>
              <p>
                Business
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              
              
            </ul>
          </li>      
        </ul>
      </nav>
  
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
</template>

<script>
export default {
    data() {
        return {
            
        }
    },
    mounted(){
        
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
</style>
