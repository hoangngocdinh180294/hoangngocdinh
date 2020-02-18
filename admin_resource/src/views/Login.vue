<template>
    <div class="bg-image" style="background-image: url('{{ asset('admin/media/photos/photo19@2x.jpg')}}');">
        <div class="row no-gutters justify-content-center bg-primary-dark-op">
            <div class="hero-static col-sm-8 col-md-6 col-xl-4 d-flex align-items-center p-2 px-sm-0">
                <!-- Sign In Block -->
                <div class="block block-transparent block-rounded w-100 mb-0 overflow-hidden">
                    <div class="block-content block-content-full px-lg-5 px-xl-6 py-4 py-md-5 py-lg-6 bg-white">
                        <!-- Header -->
                        <div class="mb-2 text-center">
                            <a class="link-fx font-w700 font-size-h1" href="{{route('home')}}">
                                <span class="text-dark">GREENHOUSE</span>
                            </a>
                            <p class="text-uppercase font-w700 font-size-sm text-muted">Đăng nhập</p>
                        </div>
                        <!-- END Header -->

                        <!-- Sign In Form -->
                        <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _es6/pages/op_auth_signin.js) -->
                        <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                        <form ref="loginForm">
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="text" v-model="login.email" class="form-control" id="login-username" name="email" placeholder="Email">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-user-circle"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <input type="password" v-model="login.password" @keyup.enter="handleLogin" class="form-control" id="login-password" name="password" placeholder="Mật khẩu">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa fa-asterisk"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" @click.prevent="handleLogin" class="btn btn-hero-primary">
                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Đăng nhập
                                </button>
                            </div>
                        </form>
                        <!-- END Sign In Form -->
                    </div>
                </div>
                <!-- END Sign In Block -->
            </div>
        </div>
    </div>
</template>

<script>
  import {
    mapActions
  } from 'vuex'
  export default {
    data: () => ({
      valid: true,
      showError: false,
      login: {
        email: '',
        password: '',
      },
      emailRules: [
        v => /.+@.+/.test(v) || 'Please enter email format'
      ],
      redirect: undefined,
      loading: false
    }),

    watch: {
      $route: {
        handler: function(route) {
          this.redirect = route.query && route.query.redirect
        },
        immediate: true
      }
    },

    methods: {
      ...mapActions('user', ['LoginByUsername']),
      handleLogin() {
        // if(this.$refs.loginForm.validate()) {
          this.loading = true
          this.showError = false
          this.LoginByUsername(this.login).then(() => {
            this.loading = false
            location.reload()
          }, () => {
            this.loading = false
            this.showError = true;
            Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Thông tin đăng nhập không đúng. Vui lòng thử lại.'})
          })
      }
    }
  }
</script>
