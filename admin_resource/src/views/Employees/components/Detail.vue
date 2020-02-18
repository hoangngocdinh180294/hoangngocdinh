<template>
<main id="main-container">
  <!-- Page Content -->
  <div class="row no-gutters flex-md-10-auto">
      <div class="col-md-2">
          <!-- <div class="content p-0">
              <div class="d-md-none p-3">
                 <button type="button" class="btn btn-block btn-hero-primary" data-toggle="class-toggle" data-target="#side-content" data-class="d-none">
                      Cài đặt
                  </button>
              </div>
             
          </div> -->
      </div>
      <div class="col-md-8 order-md-0">
          <!-- Main Content -->
          <div class="content content-full">
              <div class="block block-fx-pop">
                  <div class="block-content block-content-full d-flex justify-content-between border-bottom">
                      <div>
                          <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <span>
                                            <i class="nav-main-link-icon fa fa-user"></i>
                                        </span>
                                    <li class="breadcrumb-item"><router-link :to="'/employees'">Lãnh đạo</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">Sửa Lãnh đạo / {{currentForm.name}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>Thêm lãnh đạo</li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                                    </ol>
                                </nav>
                      </div>
                      <div>
                          <!-- <a class="btn btn-sm btn-secondary" href="javascript:void(0)">Preview</a> -->
                          <a class="btn btn-sm btn-info" href="javascript:void(0)" @click.prevent="submitForm">Lưu lại</a>
                      </div>
                  </div>
                  <div class="block-content">
                      <form method="POST" onsubmit="return false;">
                         <div id="side-content" class="d-none d-md-block push">
                  <div id="settings-accordion" role="tablist" aria-multiselectable="true">
                      <div class="block mb-0">
                      <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h4">
                          <a class="font-w600 d-block w-100 p-3" data-parent="#settings-accordion" href="#settings-accordion_s4" aria-expanded="true" aria-controls="settings-accordion_s4">Ảnh đại diện</a>
                      </div>
                      <div id="settings-accordion_s4" role="tabpanel" aria-labelledby="settings-accordion_h4" data-parent="#settings-accordion">
                          <div class="block-content block-content-full" @click="openFileManager('image')">
                              <input type="hidden" v-model="currentForm.image" />
                              <div v-if="currentForm.image && currentForm.image != ''">
                                  <img class="img-fluid" :src="currentForm.image" alt="">
                              </div>
                              <div v-else class="btn-add-image"> + </div>
                          </div>
                      </div>
                  </div>
                  </div>
              </div>
                          <div class="form-group">
                              <input v-validate="'required|max:254'" v-model="currentForm.name" type="text" class="form-control py-4" id="post-name" name="name" placeholder="Họ và tên ...">
                              <span class="text-danger">{{ errors.first('name') }}</span>
                          </div>
                          <div class="form-group">
                              <input v-validate="'required|email'" v-model="currentForm.email" type="text" class="form-control py-4" id="post-email" name="email" placeholder="Email ..." >
                              <span class="text-danger">{{ errors.first('email') }}</span>
                          </div>
                          <div class="form-group">
                              <input v-validate="'required|max:10'" v-model="currentForm.phone" type="text" class="form-control py-4" id="post-phone" name="phone" placeholder="Số điện thoại ...">
                              <span class="text-danger">{{ errors.first('phone') }}</span>
                          </div>
                          <div class="form-group">
                              <input v-validate="'required|max:254'" v-model="currentForm.position" type="text" class="form-control py-4" id="post-position" name="position" placeholder="Chức vụ ...">
                              <span class="text-danger">{{ errors.first('position') }}</span>
                          </div>
                          <div class="form-group">
                                      <label for="txt-description">Ghi chú</label>
                                      <textarea v-model="currentForm.note" class="form-control" id="txt-note" name="txt-note" rows="4"></textarea>
                                  </div>
                      </form>
                  </div>
              </div>
          </div>
          <!-- END Main Content -->
      </div>
      <div class="col-md-2 ">
      </div>
  </div>
  <!-- END Page Content -->
  <!-- <add-category :editedIndex="newDirectoryIndex" :editedItem="newDirectoryItem" :slug="newDirectorySlug" @saveSuccess="saveNewDirectorySuccess()" /> -->
  <file-manager-popup />
</main>
<!-- END Main Container -->
</template>

<script>
import { getApi, createApi, updateApi } from '@/api/employees'
import Vue from 'vue';
import VeeValidate from 'vee-validate';
import { Validator } from 'vee-validate';
import _ from 'lodash'
import { mapMutations } from 'vuex'
Vue.use(VeeValidate, {
    useConstraintAttrs: false
});

const defaultForm = {
  id: null,
  name:'',
  position:'',
  note: '',
  email:'',
  phone:'',
  image: '',
};
const dictionary = {
    vn: {
        custom:{
            name:{
                required:'Vui lòng nhập tên lãnh đạo',
                max:"Tên quá dài"
            },
            email:{
                required:'Vui lòng nhập email',
                email: 'Vui lòng nhập đúng định dạng email. VD: abc@gmail.com',
            },
            phone:{
                required:'Vui lòng nhập số điện thoại',
                max: 'Số điện thoại tối đa 10 chữ số'
            },
            position:{
                required:'Vui lòng nhập chức vụ',
                max:"Tên chức vụ quá dài"
            },
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
  components: {  },
  data() {
    return {
      currentForm: Object.assign({}, defaultForm),
      valid: true,
      loading: false,
      nameRules: [
        v => v.length > 0 || 'Tên lãnh đạo không được để trống'
      ],
      panel: [
        false
      ],
      newDirectoryItem: {},
      newDirectoryIndex: -1,
      newDirectorySlug: ''
    }
  },
  computed: {
  },
  watch: {
    // 'currentForm.title': function() {
    //   if (this.isAutoSlug) {
    //     this.slug = slugify(_.lowerCase(this.currentForm.title))
    //   }
    // }
  },
  created() {
    if (this.isEdit) {
      const id = this.$route.params && this.$route.params.employee;
      // this.isAutoSlug = false;
      this.getData(id)
    } else {
      this.currentForm = Object.assign({}, defaultForm)
    }
  },
  methods: {
    ...mapMutations('app', ['setSnackbar', 'setMessage']),
    // listCategories() {
    //   categoriesListApi().then(response => {
    //     this.categories = response
    //   }).catch(err => {
    //     console.log(err)
    //   })
    // },
    getData(id) {
      getApi(id).then(response => {
        this.currentForm = response;
        this.slug = response.slug;
        // this.selectedCategories = response.categories.map(el => el.id)
      }).catch(err => {
        console.log(err)
      })
    },
    submitFormRequest(data) {
      return new Promise((resolve, reject) => {
        if (this.isEdit) {
          const id = this.$route.params && this.$route.params.employee;
          updateApi(id, data).then(response => {
            resolve(response)
          }).catch(err => {
            console.log(err);
            reject(err)
          })
        } else {
          createApi(data).then(response => {
            resolve(response)
          }).catch(err => {
            console.log(err);
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
          // this.currentForm.slug = this.slug;
          // this.currentForm.categories = this.selectedCategories;
          this.submitFormRequest(this.currentForm).then((response) => {
            this.loading = false;
            Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu lãnh đạo thành công.'});
            if (!this.isEdit) {
              this.$router.replace('/employees/edit/' + response.id)
            }
          },
          () => {
            this.loading = false;
            Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Không lưu được. Vui lòng lưu lại bài viết bằng công cụ khác. Reload và thử lại.'})
          })
            }
        });
      // }
    },
    openFileManager(model) {
      var _this = this;
      window.setFileToElement = function(fileurl, filepath) {
        _this.currentForm[model] = filepath;
        _this.$store.dispatch('file/closeFileManager');
        jQuery('#modal-site-file').modal('hide')
      };
      if (model == 'video') {
        this.$store.dispatch('file/setType', 'Files')
      }
      this.$store.dispatch('file/openFileManager');
      jQuery('#modal-site-file').modal('show')
    },
    // createDirectory() {
    //   this.newDirectoryItem = {
    //     id: null,
    //     name: '',
    //     slug: '',
    //     create_at: ''
    //   };
    //   this.newDirectoryIndex = -1;
    //   this.newDirectorySlug = ''
    //   jQuery('#modal-add-category').modal('show')
    // },
    // saveNewDirectorySuccess() {
    //   jQuery('#modal-add-category').modal('hide');
    //   this.listCategories()
    // }
  }
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>
  .btn-add-image {
    color: #7c7a7a;
    font-size: 79px;
    line-height: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #ccc;
  }
  li.breadcrumb-item.active {
      display: -webkit-box;
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
       margin-top: 0px;
  }
</style>
