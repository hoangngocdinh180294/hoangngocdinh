<template>
<main id="main-container">
  <!-- Page Content -->
  <div class="row no-gutters flex-md-10-auto">
      <div class="col-md-4 col-lg-5 col-xl-3 order-md-1 bg-white">
          <div class="content p-0">
              <!-- Toggle Settings -->
              <div class="d-md-none p-3">
                  <!-- Class Toggle, functionality initialized in Helpers.coreToggleClass() -->
                  <button type="button" class="btn btn-block btn-hero-primary" data-toggle="class-toggle" data-target="#side-content" data-class="d-none">
                      Cài đặt
                  </button>
              </div>
              <!-- END Toggle Settings -->

              <!-- Settings -->
              <div id="side-content" class="d-none d-md-block push">
                  <div id="settings-accordion" role="tablist" aria-multiselectable="true">
                      <div class="block mb-0">
                          <div class="block-header block-header-default p-0" role="tab" id="settings-accordion_h1">
                              <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s1" aria-expanded="true" aria-controls="settings-accordion_s1">Trạng thái</a>
                          </div>
                          <div id="settings-accordion_s1" class="collapse show" role="tabpanel" aria-labelledby="settings-accordion_h1" data-parent="#settings-accordion">
                              <div class="block-content">
                                  <div class="form-group row">
                                      <div class="col-12">
                                          <select v-model="currentForm.status" class="custom-select" id="example-wp-visibility" name="example-wp-visibility">
                                              <option v-for="(status, oidx) in listStatus" :value="status.id" :key="oidx"> {{ status.name}}</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="block mb-0">
                      <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h4">
                          <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s4" aria-expanded="true" aria-controls="settings-accordion_s4">Hình đại diện</a>
                      </div>
                      <div id="settings-accordion_s4" class="collapse" role="tabpanel" aria-labelledby="settings-accordion_h4" data-parent="#settings-accordion">
                          <div class="block-content block-content-full" @click="openFileManager('image')">
                              <input type="hidden" v-model="currentForm.image" />
                              <div v-if="currentForm.image && currentForm.image != ''">
                                  <img class="img-fluid" :src="currentForm.image" alt="">
                              </div>
                              <div v-else class="btn-add-image"> + </div>
                          </div>
                      </div>
                  </div>
                      <div class="block mb-0">
                          <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h7">
                              <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s7" aria-expanded="true" aria-controls="settings-accordion_s7">SEO</a>
                          </div>
                          <div id="settings-accordion_s7" class="collapse" role="tabpanel" aria-labelledby="settings-accordion_h7" data-parent="#settings-accordion">
                              <div class="block-content">
                                  <div class="form-group">
                                      <label for="txt-description">Meta Description</label>
                                      <div class="font-size-sm text-muted mb-2">Hiển thị thẻ meta description</div>
                                      <textarea v-model="currentForm.meta_description" class="form-control" id="txt-description" name="txt-description" rows="4"></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="txt-keywords">Meta Keywords</label>
                                      <div class="font-size-sm text-muted mb-2">Những từ khoá</div>
                                      <textarea v-model="currentForm.meta_keywords" class="form-control" id="txt-keywords" name="txt-keywords" rows="4"></textarea>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- END Settings -->
          </div>
      </div>
      <div class="col-md-8 col-lg-7 col-xl-9 order-md-0 bg-body-dark">
          <!-- Main Content -->
          <div class="content content-full">
              <div class="block block-fx-pop">
                  <div class="block-content block-content-full d-flex justify-content-between border-bottom">
                      <div>
                          <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                      <span>
                                            <i class="nav-main-link-icon fa fa-thumbtack"></i>
                                        </span>
                                    <li class="breadcrumb-item"><router-link :to="'/custommers'">Khách hàng</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">Sửa khách hàng / {{currentForm.title}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>Tạo khách hàng</li>
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
                          <div class="form-group">
                              <input v-validate="'required|min:1|max:254'" v-model="currentForm.title" type="text" class="form-control py-4" id="post-title" name="title" placeholder="Tiêu đề ...">
                              <span class="text-danger">{{ errors.first('title') }}</span>
                          </div>
                          <div class="form-group">
                            <input type="text" v-model="slug" class="form-control py-4" id="post-slug" name="post-slug" placeholder="Url ...">
                          </div>
                          <div class="form-group">
                              <tinymce-tinymce v-model="currentForm.body" :key= "'vue-tinymce-' + currentForm.id"/>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
          <!-- END Main Content -->
      </div>
  </div>
  <!-- END Page Content -->
  <add-category :editedIndex="newDirectoryIndex" :editedItem="newDirectoryItem" :slug="newDirectorySlug" @saveSuccess="saveNewDirectorySuccess()" />
  <file-manager-popup />
</main>
<!-- END Main Container -->
</template>

<script>
import { getApi, createApi, updateApi } from '@/api/custommers'
import Vue from 'vue';
import VeeValidate from 'vee-validate';
import { Validator } from 'vee-validate';
import _ from 'lodash'
import { mapMutations } from 'vuex'
var slugify = require('slugify');
Vue.use(VeeValidate, {
    useConstraintAttrs: false
});

const defaultForm = {
  id: null,
  title: '',
  slug: '',
  body: '',
  image: '',
  meta_description: '',
  meta_keywords: '',
  status: 1
};
const dictionary = {
    vn: {
        custom:{
            title:{
                required:'Vui lòng nhập Tiêu đề',
                min:"Tiêu đề ít nhất 1 kí tự",
                max:"Tiêu đề quá dài"
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
  components: {  },
  data() {
    return {
      currentForm: Object.assign({}, defaultForm),
      valid: true,
      loading: false,
      titleRules: [
        v => v.length > 0 || 'Tiêu đề không được để trống'
      ],
      slugRules: [
        v => v.length > 0 || 'Url không được để trống',
        v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url không chứa khoảng trắng'
      ],
      listStatus: [
        {id: 1, 'name': 'Xuất bản'},
        {id: 0, 'name': 'Bản nháp'}
      ],
      panel: [
        false
      ],
      slug: '',
      isAutoSlug: true,
      selectedCategories: [],
      newDirectoryItem: {},
      newDirectoryIndex: -1,
      newDirectorySlug: ''
    }
  },
  computed: {
  },
  watch: {
    'currentForm.title': function() {
      if (this.isAutoSlug) {
        this.slug = slugify(_.lowerCase(this.currentForm.title))
      }
    }
  },
  created() {
    if (this.isEdit) {
      const id = this.$route.params && this.$route.params.custommer;
      this.isAutoSlug = false;
      this.getData(id)
    } else {
      this.currentForm = Object.assign({}, defaultForm)
    }
  },
  methods: {
    ...mapMutations('app', ['setSnackbar', 'setMessage']),
    getData(id) {
      getApi(id).then(response => {
        this.currentForm = response;
        this.slug = response.slug;
      }).catch(err => {
        console.log(err)
      })
    },
    submitFormRequest(data) {
      return new Promise((resolve, reject) => {
        if (this.isEdit) {
          const id = this.$route.params && this.$route.params.custommer;
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
          this.currentForm.slug = this.slug;
          this.submitFormRequest(this.currentForm).then((response) => {
            this.loading = false;
            Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu thành công.'});
            if (!this.isEdit) {
              this.$router.replace('/custommers/edit/' + response.id)
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
    createDirectory() {
      this.newDirectoryItem = {
        id: null,
        name: '',
        slug: '',
        create_at: ''
      };
      this.newDirectoryIndex = -1;
      this.newDirectorySlug = ''
      jQuery('#modal-add-category').modal('show')
    },
    saveNewDirectorySuccess() {
      jQuery('#modal-add-category').modal('hide');
      this.listCategories()
    }
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
