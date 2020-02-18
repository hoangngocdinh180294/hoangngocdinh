<template>
  <main id="main-container">
    <div class="content">
      <form ref="currentxForm">
        <div class="block block-rounded block-bordered">
          <div class="block-header block-header-default">
              <!-- <h3 class="block-title">Thêm người dùng mới</h3> -->
              <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <span>
                                            <i class="nav-main-link-icon fa fa-user"></i>
                                        </span>
                                    <li class="breadcrumb-item"><router-link :to="'/users'">Người dùng</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">Sửa Người dùng / {{currentForm.name}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>Thêm người dùng mới</li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                                    </ol>
                                </nav>
          </div>
          <div class="block-content">
              <div class="row justify-content-center py-sm-3 py-md-5">
                  <div class="col-sm-10 col-md-8">
                      <div class="form-group">
                          <label >Tên tài khoản</label>
                          <input  v-validate="'required|min:6'" type="text" v-model="currentForm.name" class="form-control form-control-alt"  name="username" placeholder="Nhập tên tài khoản">
                          <span class="text-danger">{{ errors.first('username') }}</span>
                      </div>
                      <div class="form-group">
                          <label >Email</label>
                          <input v-validate="'required|email|min:10'" type="text" v-model="currentForm.email" class="form-control form-control-alt"  name="email" placeholder="Nhập thư điện tử">
                          <span class="text-danger">{{ errors.first('email') }}</span>
                      </div>
                      <div class="form-group">
                          <label >Mật khẩu</label>
                          <input v-validate="'required|min:6'" type="password" v-model="currentForm.password" class="form-control form-control-alt" name="password" placeholder="Nhập mật khẩu">
                          <span class="text-danger">{{ errors.first('password') }}</span>
                      </div>
                  </div>
              </div>
          </div>
          <div class="block-content block-content-full block-content-sm bg-body-light text-right">
              <button type="submit" class="btn btn-sm btn-success" @click.prevent="submitForm">
                  <i class="fa fa-check"></i> Lưu lại
              </button>
          </div>
        </div>
      </form>
    </div>
  </main>
</template>

<script>
import { getApi, createApi, updateApi } from '@/api/users';
import Vue from 'vue';
import VeeValidate from 'vee-validate';
import { Validator } from 'vee-validate';
import _ from 'lodash'
import { mapMutations } from 'vuex'


Vue.use(VeeValidate, {
    useConstraintAttrs: false
});

const defaultForm = {
  username: '',
  email: '',
  password: ''
};
const dictionary = {
    vn: {
       custom:{
           username:{
               required:'Vui lòng nhập username',
               min:"Username ít nhất 6 kí tự"
           },
           email:{
               required:'Vui lòng nhập mail bạn',
               email:'Mail chưa đúng định dạng',
               min:"Tên ít nhất 6 kí tự"
           },
           password:{
               required:'Vui lòng nhập mật khẩu của bạn',
               min:"Mật khẩu ít nhất 6 kí tự"
           }
       }
    }
};
Validator.localize(dictionary);

const validator = new Validator({ first_name: 'min',second_name:'required' });

validator.localize('vn');

export default {
  name: 'Detail',
  props: {
    isEdit: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      currentForm: Object.assign({}, defaultForm),
      valid: true,
      loading: false,
      snackbar: false,
      txtError: '',
      nameRules: [
        v =>  !!v || 'Vui lòng nhập tên'
      ],
      emailRules: [
        v => !!v || 'Vui lòng nhập email',
        v => /.+@.+/.test(v) || 'Vui lòng nhập đúng định dạng email'
      ],
      passwordRules: [
        v => !!v || 'Vui lòng nhập mật khẩu'
      ],
    }
  },
  computed: {
  },
  created() {
    if (this.isEdit) {
      const id = this.$route.params && this.$route.params.user;
      this.passwordRules = [];
      this.getData(id)
    } else {
      this.currentForm = Object.assign({}, defaultForm)
    }
  },
  methods: {
      // validateBeforeSubmit() {
      //     this.$validator.validateAll().then((result) => {
      //         if (result) {
      //             // eslint-disable-next-line
      //             alert('Form Submitted!');
      //             return;
      //         }
      //
      //         alert('Correct them errors!');
      //     });
      // },
    getData(id) {
      getApi(id).then(response => {
        this.currentForm = response

      }).catch(err => {
        console.log(err)
      })
    },
    submitFormRequest(data) {
      return new Promise((resolve, reject) => {
        if (this.isEdit) {
          const id = this.$route.params && this.$route.params.user;
          updateApi(id, data).then(response => {
            resolve(response)
          }).catch(err => {
            reject(err)
          })
        } else {
          createApi(data).then(response => {
            resolve(response)
          }).catch(err => {
            reject(err)
          })
        }
      })
    },
    submitForm() {
      // if(this.$refs.currentxForm.validate()) {
        this.$validator.validateAll().then((result) => {
            if (result) {
                this.loading = true;
                this.submitFormRequest(this.currentForm).then((response) => {
                    this.loading = false;
                    Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu người dùng thành công.'});
                    if (!this.isEdit) {
                        // this.$router.push({path: '/users'})
                        this.$router.replace('/users/edit/' + response.id)
                    }
                },
                // ).catch((error) => {
                //     this.loading = false
                //     this.txtError = 'Xảy ra lỗi, vui lòng lưu lại các thay đổi của bạn và reload page'
                //     this.snackbar = true
                // })
                    () => {
                        this.loading = false;
                        Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Email đã có.'})
                    })
            }
        });
    },
    openFileManager(model) {
      var _this = this;
      window.setFileToElement = function(fileurl, filepath) {
        _this.currentForm[model] = fileurl;
        _this.$store.dispatch('file/closeFileManager')
      };
      this.$store.dispatch('file/openFileManager')
    }
  }
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>

</style>
