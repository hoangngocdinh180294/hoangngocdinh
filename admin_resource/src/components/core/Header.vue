<template>
  <!-- Header -->
  <header id="page-header">
      <!-- Header Content -->
      <div class="content-header">
          <!-- Left Section -->
          <div>
              <!-- Toggle Sidebar -->
              <!-- Laout API, functionality initialized in Template._uiApiLayout()-->
              <button type="button" class="btn btn-dual mr-1 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                  <i class="fa fa-fw fa-bars"></i>
              </button>
              <!-- END Toggle Sidebar -->

              <!-- Website Dropdown -->
              <div class="dropdown d-inline-block">
                  <button type="button" class="btn btn-dual" id="page-header-website-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-fw fa-home"></i>
                      <span class="d-none d-sm-inline ml-1">Website</span>
                  </button>
                  <div class="dropdown-menu p-0" aria-labelledby="page-header-website-dropdown">
                      <div class="p-2">
                          <a class="dropdown-item mb-0" target="_blank" href="/">
                              <i class="fa fa-fw fa-globe mr-1"></i> Xem website
                          </a>
                      </div>
                  </div>
              </div>
              <!-- END Website Dropdown -->

              <!-- New Dropdown -->
              <div class="dropdown d-inline-block">
                  <button type="button" class="btn btn-dual" id="page-header-new-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-fw fa-plus"></i>
                      <span class="d-none d-sm-inline ml-1">Thêm mới</span>
                  </button>
                  <div class="dropdown-menu p-0" aria-labelledby="page-header-new-dropdown">
                      <div class="p-2">
                        <router-link :to="'/posts/create'">
                          <a class="dropdown-item" href="javascript:void(0)">
                              <i class="fa fa-fw fa-thumbtack mr-1"></i> Bài viết
                          </a>
                        </router-link>
                        <router-link :to="'/projects/create'">
                              <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="nav-main-link-icon si si-grid"></i> Dự án
                              </a>
                        </router-link>
                        <router-link :to="'/pages/create'">
                          <a class="dropdown-item" href="javascript:void(0)">
                              <i class="fa fa-fw fa-file mr-1"></i> Trang
                          </a>
                        </router-link>
                        <!-- <router-link :to="'/users/create'">
                          <a class="dropdown-item" href="javascript:void(0)">
                              <i class="fa fa-fw fa-user mr-1"></i> Người dùng
                          </a>
                       </router-link> -->
                    <!--   <router-link :to="'/services/create'">
                              <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fab fa-servicestack mr-2"></i> Dịch vụ
                              </a>
                        </router-link>
                        <router-link :to="'/testimonials/create'">
                              <a class="dropdown-item" href="javascript:void(0)">
                                  <i class="fas fa-comments mr-2"></i>Ý kiến khách hàng
                              </a>
                         </router-link>-->
                      </div>
                  </div>
              </div>
              <!-- END New Dropdown -->
          </div>
          <!-- END Left Section -->

          <!-- Right Section -->
          <div>
              <!-- User Dropdown -->
              <div class="dropdown d-inline-block">
                  <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="d-none d-lg-inline mr-2">Xin chào quản trị viên</span>
                      <img class="img-avatar img-avatar32" src="/admin-resources/media/avatars/avatar10.jpg" alt="">
                  </button>
                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right p-0 overflow-hidden" aria-labelledby="page-header-user-dropdown">
                      <div class="row no-gutters">
                          <div class="col-12 p-2">
                              <a @click.prevent="handleLogout()" class="dropdown-item">
                                  Log Out
                              </a>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- END User Dropdown -->
          </div>
          <!-- END Right Section -->
      </div>
      <!-- END Header Content -->

      <!-- Header Search -->
      <div id="page-header-search" class="overlay-header bg-sidebar-dark">
          <div class="content-header">
              <form class="w-100" action="be_pages_generic_search.html" method="POST">
                  <div class="input-group">
                      <div class="input-group-prepend">
                          <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                          <button type="button" class="btn btn-danger" data-toggle="layout" data-action="header_search_off">
                              <i class="fa fa-fw fa-times-circle"></i>
                          </button>
                      </div>
                      <input type="text" class="form-control border-0" placeholder="Search WP Post.." id="page-header-search-input" name="page-header-search-input">
                  </div>
              </form>
          </div>
      </div>
      <!-- END Header Search -->

      <!-- Header Loader -->
      <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
      <div id="page-header-loader" class="overlay-header bg-primary-darker">
          <div class="content-header">
              <div class="w-100 text-center">
                  <i class="fa fa-fw fa-2x fa-sun fa-spin text-white"></i>
              </div>
          </div>
      </div>
      <!-- END Header Loader -->
  </header>

</template>

<script>
import {
  mapMutations,
  mapActions
} from 'vuex'
export default {
  data: () => ({
  }),
  methods: {
    ...mapActions('user', ['Logout']),
    ...mapMutations('app', ['setDrawer']),
    handleLogout() {
      this.Logout().then(() => {
          location.reload()
        }).catch(() => {
          location.reload()
        })
    },
    onClickDrawer () {
      this.setDrawer(!this.$store.state.app.drawer)
    },
  }
}
</script>

<style>
  #core-toolbar a {
    text-decoration: none;
  }
</style>
