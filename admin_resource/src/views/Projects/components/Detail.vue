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
                                  <!-- <div class="form-group row">
                                      <label class="col-sm-4 col-form-label" for="example-wp-format">Post Format</label>
                                      <div class="col-sm-8">
                                          <select class="custom-select" id="example-wp-format" name="example-wp-format">
                                              <option value="1">Gallery</option>
                                              <option value="2">Link</option>
                                              <option value="3">Image</option>
                                              <option value="4">Quote</option>
                                              <option value="5" selected>Standard</option>
                                              <option value="6">Video</option>
                                              <option value="7">Audio</option>
                                          </select>
                                      </div>
                                  </div> -->

                                  <!-- <div class="form-group row">
                                      <label class="col-sm-4 col-form-label" for="example-wp-author">Author</label>
                                      <div class="col-sm-8">
                                          <select class="custom-select" id="example-wp-author" name="example-wp-author">
                                              <option value="1" selected>Admin</option>
                                              <option value="2">Author #1</option>
                                              <option value="3">Author #2</option>
                                          </select>
                                      </div>
                                  </div> -->
                              </div>
                          </div>
                      </div>
               
                      <div class="block mb-0">
                          <div class="block-header block-header-default border-top p-0" role="tab" id="settings-accordion_h2">
                              <a class="font-w600 d-block w-100 p-3" data-toggle="collapse" data-parent="#settings-accordion" href="#settings-accordion_s2" aria-expanded="true" aria-controls="settings-accordion_s2">Danh mục
                                  <span class="text-danger"><br>{{ errors.first('projectcategories') }}</span>
                              </a>
                          </div>
                          <div id="settings-accordion_s2" class="collapse" role="tabpanel" aria-labelledby="settings-accordion_h2" data-parent="#settings-accordion">
                              <div class="block-content block-content-full">
                                  <div class="form-group">
                                      <div v-for="(category, cidx) in projectcategories" :key="cidx" class="custom-control custom-radio custom-control-primary mb-1">
                                          <input v-validate="'required'" type="radio" v-model="selectedCategories" class="custom-control-input" :id="'input-cate-' + category.id" name="projectcategories" :value="category.id">
                                          <label class="custom-control-label" :for="'input-cate-' + category.id">{{ category.name }}</label>
                                      </div>
                                  </div>
                                  <a class="link-fx font-size-sm" href="javascript:void(0)" @click.prevent="createDirectory()">Thêm danh mục mới</a>
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
                                      <div class="font-size-sm text-muted mb-2">Hiển thị thẻ meta description cho dự án</div>
                                      <textarea v-model="currentForm.meta_description" class="form-control" id="txt-description" name="txt-description" rows="4"></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="txt-keywords">Meta Keywords</label>
                                      <div class="font-size-sm text-muted mb-2">Những từ khoá cho dự án</div>
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
                                            <i class="nav-main-link-icon si si-grid"></i>
                                        </span>
                                    <li class="breadcrumb-item"><router-link :to="'/projects'">Dịch vụ</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">Sửa Dịch vụ / {{currentForm.title}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>Tạo Dịch vụ</li>
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
                          <div class="form-group">
                              <input v-validate="'required|min:1|max:254'" v-model="currentForm.title" type="text" class="form-control py-4" id="post-title" name="title" placeholder="Tiêu đề ...">
                              <span class="text-danger">{{ errors.first('title') }}</span>
                          </div>
                          <div class="form-group">
                            <input type="text" v-model="slug" class="form-control py-4" id="post-slug" name="post-slug" placeholder="Url ...">
                          </div>
                          <div class="form-group">
                              <tinymce-tinymce v-model="currentForm.body" :key= "'vue-tinymce-' + currentForm.id" />
                          </div>
                  </div>
                  <div class="block-content block-content-full border-top">
                    <div class="mb-2">
                        <button type="button" class="btn btn-sm btn-light">
                            <i class="fa fa-plus"></i>
                        </button>
                        Hình ảnh dự án
                    </div>
                    <div class="row gutters-tiny js-gallery img-fluid-100 js-gallery-enabled">
                      <div class="col-md-6 col-lg-4 animated fadeIn push project-image" v-for="(image, index) in images" :key="index" >
                        <div v-if="image && image.image  && image.image != ''">
                          <img class="img-fluid" :src="image.image" alt="">
                        </div>
                        <div v-else class="btn-add-image bg-grey"></div>
                        <div class="image-action">
                          <span  v-if="image && image.image  && image.image != '' && image.is_default == 1 " class="btn btn-sm mr-1 is-featured" >Đang là đại diện</span>
                          <a  v-if="image && image.image  && image.image != '' && image.is_default != 1 " class="btn btn-sm mr-1 btn-danger" href="javascript:void(0)" @click.prevent="toogleFeatureImage(index)">Đặt làm đại diện</a>
                          <a class="btn btn-sm btn-info add-image mr-1" href="javascript:void(0)" @click.prevent="openFileManager(index)">Chọn hình</a>
                          <a class="btn btn-sm btn-danger remove-image" href="javascript:void(0)" @click.prevent="removeImage(index)">Xoá hình</a>
                        </div>
                      </div>
                      <div class="col-md-6 col-lg-4 animated fadeIn push project-image">
                        <div class="btn-add-image plus-button" @click.prevent="addNewImage()"> + </div>
                      </div>
                    </div>
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
import { getApi, createApi, updateApi } from '@/api/projects'
import Vue from 'vue';
import VeeValidate from 'vee-validate';
import { Validator } from 'vee-validate';
import { createApi as categoriesCreateApi, listApi as categoriesListApi } from '@/api/projectcategories'
import AddCategory from './AddCategory'
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
  meta_description: '',
  meta_keywords: '',
  status: 1,
  projectcategories: [],
  images: []
};
const dictionary = {
    vn: {
        custom:{
            title:{
                required:'Vui lòng nhập Tiêu đề',
                min:"Tiêu đề ít nhất 1 kí tự",
                max:"Tiêu đề quá dài"
            },
            projectcategories:{
                required:'Vui lòng chọn Danh mục'
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
  components: { AddCategory },
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
      projectcategories: [],
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
      newDirectorySlug: '',
      images: []
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
      const id = this.$route.params && this.$route.params.project;
      this.isAutoSlug = false;
      this.getData(id)
    } else {
      this.currentForm = Object.assign({}, defaultForm)
    }
    this.listCategories()
  },
  methods: {
    ...mapMutations('app', ['setSnackbar', 'setMessage']),
    listCategories() {
      categoriesListApi().then(response => {
        this.projectcategories = response
      }).catch(err => {
        console.log(err)
      })
    },
    addNewImage() {
      this.images.push({ image: ''})
    },
    removeImage(idx) {
      this.images.splice(idx, 1)
    },
    toogleFeatureImage(idx) {
      if (this.images[idx]['is_default'] == 0) {
        this.images = this.images.map(function(el) {
          el.is_default = 0;
          return el;
        })
        this.images[idx]['is_default'] = 1
      }
      else {
        this.images[idx]['is_default'] = 0
      }
    },
    getData(id) {
      getApi(id).then(response => {
        this.currentForm = response;
        this.slug = response.slug;
        this.images = response.images;
        this.selectedCategories = response.projectcategories.id
      }).catch(err => {
        console.log(err)
      })
    },
    submitFormRequest(data) {
      return new Promise((resolve, reject) => {
        if (this.isEdit) {
          const id = this.$route.params && this.$route.params.project;
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
          this.currentForm.projectcategories = this.selectedCategories;
          this.currentForm.images = this.images;
          this.submitFormRequest(this.currentForm).then((response) => {
            this.loading = false;
            Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu dự án thành công.'});
            if (!this.isEdit) {
              this.$router.replace('/projects/edit/' + response.id)
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
    openFileManager(index) {
      var _this = this;
      window.setFileToElement = function(fileurl, filepath) {
        _this.images[index].image = filepath;
        _this.$store.dispatch('file/closeFileManager');
        jQuery('#modal-site-file').modal('hide')
      };
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
      this.newDirectorySlug = '';
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
    height: 100px;
    &.plus-button {
      cursor: pointer;
    }
    &.bg-grey {
      background: #ccc;
    }
  }

  .project-image {
    height: 100px;
    position: relative;
    img {
      width: 100%;
      height: 100px;
      object-fit: cover;
    }
    .image-action {
      position: absolute;
      right: 10px;
      top: 10px;
    }
  }
  li.breadcrumb-item.active {
      display: -webkit-box;
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;
      overflow: hidden;
      text-overflow: ellipsis;
  }
  .is-featured {
    border: 1px solid green;
  }
</style>
