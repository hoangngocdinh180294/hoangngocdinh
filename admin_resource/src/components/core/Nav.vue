<template>
  <nav id="sidebar" aria-label="Main Navigation" data-simplebar="init">

          <!-- Side Header -->
    <div class="bg-header-dark">
        <div class="content-header bg-white-10">
            <!-- Logo -->
            <a class="link-fx font-w700 font-size-lg text-white" href="index.html">
                <span class="smini-visible">
                    <span class="text-white-75">
                        G
                    </span>
                </span>
                <span class="smini-hidden">
                    <span class="text-white">greenhouse.vn</span>
                </span>
            </a>
            <!-- END Logo -->

            <!-- Options -->
            <div>
                <!-- Close Sidebar, Visible only on mobile screens -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                <a class="d-lg-none text-white ml-2" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                    <i class="fa fa-times-circle"></i>
                </a>
                <!-- END Close Sidebar -->
            </div>
            <!-- END Options -->
        </div>
    </div>
    <!-- END Side Header -->

    <!-- Side Navigation -->
    <div class="content-side content-side-full">
        <ul class="nav-main">
            <li class="nav-main-item">
                <router-link class="nav-main-link" :to="'/statisticals'">
                    <i class="nav-main-link-icon fas fa-chart-pie"></i>
                    <span class="nav-main-link-name">Tổng quan</span>
                </router-link>
            </li>
            <li class="nav-main-item">
              <router-link class="nav-main-link" :to="'/settingmenus/edit/1'">
                <i class="nav-main-link-icon si si-notebook"></i>
                <span class="nav-main-link-name">Ẩn hiện giao diện</span>
              </router-link>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-thumbtack"></i>
                    <span class="nav-main-link-name">Bài viết</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/posts'">
                        <span class="nav-main-link-name">Danh sách</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/posts/create'">
                        <span class="nav-main-link-name">Viết bài mới</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/categories'">
                        <span class="nav-main-link-name">Chuyên mục</span>
                      </router-link>
                    </li>
<!--                    <li class="nav-main-item">-->
<!--                         <router-link class="nav-main-link" :to="'/tags'">-->
<!--                        <span class="nav-main-link-name">Tag</span>-->
<!--                      </router-link>-->
<!--                    </li>-->
                </ul>
            </li>

            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-grid"></i>
                    <span class="nav-main-link-name">Dịch vụ</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/projects'">
                        <span class="nav-main-link-name">Danh sách</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/projects/create'">
                        <span class="nav-main-link-name">Dịch vụ mới</span>
                      </router-link>
                    </li>
                 <li class="nav-main-item">
                    <router-link class="nav-main-link" :to="'/projectcategories'">
                   <span class="nav-main-link-name">Chuyên mục</span>
                   </router-link>
                </li>
                </ul>
            </li>

            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-puzzle"></i>
                    <span class="nav-main-link-name">Dự án</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/services'">
                        <span class="nav-main-link-name">Danh sách</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/services/create'">
                        <span class="nav-main-link-name">Tạo mới</span>
                     </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon si si-puzzle"></i>
                    <span class="nav-main-link-name">Tuyển dụng</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/recruitments'">
                        <span class="nav-main-link-name">Danh sách</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/recruitments/create'">
                        <span class="nav-main-link-name">Tạo mới</span>
                     </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-users"></i>
                    <span class="nav-main-link-name">Khách hàng</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/custommers'">
                        <span class="nav-main-link-name">Danh sách</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/custommers/create'">
                        <span class="nav-main-link-name">Tạo mới</span>
                     </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-file"></i>
                    <span class="nav-main-link-name">Bảng giá dịch vụ</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/prices'">
                        <span class="nav-main-link-name">Danh sách</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/prices/create'">
                        <span class="nav-main-link-name">Tạo mới</span>
                     </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-user"></i>
                    <span class="nav-main-link-name">Lãnh đạo</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/employees'">
                        <span class="nav-main-link-name">Danh sách</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/employees/create'">
                        <span class="nav-main-link-name">Tạo mới</span>
                     </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <router-link class="nav-main-link" :to="'/customercontacts'">
                    <i class="nav-main-link-icon fas fa-address-card"></i>
                    <span class="nav-main-link-name">Khách hàng liên hệ</span>
                </router-link>
            </li>

<!--            <li class="nav-main-item">-->
<!--                <router-link class="nav-main-link" :to="'/subscribers'">-->
<!--                    <i class="nav-main-link-icon far fa-handshake"></i>-->
<!--                    <span class="nav-main-link-name">Người đăng ký</span>-->
<!--                </router-link>-->
<!--            </li>-->

            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-camera"></i>
                    <span class="nav-main-link-name">Media</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/media/images'">
                        <span class="nav-main-link-name">Hình ảnh</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/media/files'">
                          <span class="nav-main-link-name">Files</span>
                      </router-link>
                    </li>
                </ul>
            </li>
            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-file"></i>
                    <span class="nav-main-link-name">Tại sao chọn Green</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/pages'">
                        <span class="nav-main-link-name">Danh sách</span>
                      </router-link>
                    </li>
                    <li class="nav-main-item">
                      <router-link :to="'/pages/create'">
                        <a class="nav-main-link" href="">
                            <span class="nav-main-link-name">Tạo trang mới</span>
                        </a>
                      </router-link>
                    </li>
                </ul>
            </li>


            <li class="nav-main-item">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">
                    <i class="nav-main-link-icon fa fa-user"></i>
                    <span class="nav-main-link-name">Người dùng</span>
                </a>
                <ul class="nav-main-submenu">
                    <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/users'">
                        <span class="nav-main-link-name">Danh sách</span>
                      </router-link>
                    </li>
                    <!-- <li class="nav-main-item">
                      <router-link class="nav-main-link" :to="'/users/create'">
                        <span class="nav-main-link-name">Tạo mới</span>
                      </router-link>
                    </li> -->
                </ul>
            </li>
            <li class="nav-main-item">
              <router-link class="nav-main-link" :to="'/settings'">
                <i class="nav-main-link-icon si si-settings"></i>
                <span class="nav-main-link-name">Cấu hình</span>
              </router-link>
            </li>
            <li class="nav-main-item">
              <router-link class="nav-main-link" :to="'/slides/edit/1'">
                <i class="nav-main-link-icon si si-notebook"></i>
                <span class="nav-main-link-name">Quản lý Slides</span>
              </router-link>
            </li>
<!--            <li class="nav-main-item">-->
<!--                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="#">-->
<!--                    <i class="nav-main-link-icon fa fa-comment"></i>-->
<!--                    <span class="nav-main-link-name">Ý kiến khách hàng</span>-->
<!--                </a>-->
<!--                <ul class="nav-main-submenu">-->
<!--                    <li class="nav-main-item">-->
<!--                      <router-link class="nav-main-link" :to="'/testimonials'">-->
<!--                        <span class="nav-main-link-name">Danh sách</span>-->
<!--                      </router-link>-->
<!--                    </li>-->
<!--                    <li class="nav-main-item">-->
<!--                      <router-link class="nav-main-link" :to="'/testimonials/create'">-->
<!--                        <span class="nav-main-link-name">Tạo mới</span>-->
<!--                      </router-link>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->
            <li class="nav-main-item">
                <a class="nav-main-link" href="javascript:void(0)" data-toggle="layout" data-action="sidebar_mini_toggle">
                    <i class="nav-main-link-icon fa fa-arrows-alt-h"></i>
                    <span class="nav-main-link-name">Ẩn hiện thanh công cụ</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END Side Navigation -->
  </nav>
<!-- END Sidebar -->
</template>
<script>
export default {
  data: () => ({
  })
}
</script>
