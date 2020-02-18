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
                                      <div class="font-size-sm text-muted mb-2">Hiển thị thẻ meta description cho trang tuyển dụng</div>
                                      <textarea v-model="currentForm.meta_description" class="form-control" id="txt-description" name="txt-description" rows="4"></textarea>
                                  </div>
                                  <div class="form-group">
                                      <label for="txt-keywords">Meta Description</label>
                                      <div class="font-size-sm text-muted mb-2">Những từ khoá cho trang tuyển dụng</div>
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
                                            <i class="nav-main-link-icon fa fa-file"></i>
                                        </span>
                                    <li class="breadcrumb-item"><router-link :to="'/recruitments'">Tuyển dụng</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">Sửa / {{currentForm.position}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>Tạo mới</li>
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
                              <input v-model="currentForm.position" type="text" class="form-control py-4" id="post-title" name="post-title" placeholder="Vị trí tuyển dụng ...">
                          </div>
                          
                          <div class="form-group">
                            <input type="text" v-model="slug" class="form-control py-4" id="post-slug" name="post-slug" placeholder="Url ...">
                          </div>
                          <div class="form-group">
                              <input v-model="currentForm.qty" type="text" class="form-control py-4" id="post-qty" name="post-qty" placeholder="Số lượng ...">
                          </div>
                          <div class="form-group">
                              <input v-model="currentForm.exp" type="text" class="form-control py-4" id="post-exp" name="post-exp" placeholder="Kinh nghiệm ...">
                          </div>
                          <div class="form-group">
                              <input v-model="currentForm.salary" type="text" class="form-control py-4" id="post-exp" name="post-exp" placeholder="Mức lương ...">
                          </div>
                          <div class="form-group">
                            <lable>Yêu cầu</lable>
                              <tinymce-tinymce v-model="currentForm.requried" :key= "'vue-tinymce-' + currentForm.id" id="requried"/>
                          </div>
                          <div class="form-group">
                            <lable>Mô tả</lable>
                              <tinymce-tinymce v-model="currentForm.descript" :key= "'vue-tinymce-' + currentForm.id" id="description"/>
                          </div>
                          <div class="form-group">
                            <lable>Quyền lợi</lable>
                              <tinymce-tinymce v-model="currentForm.benefit" :key= "'vue-tinymce-' + currentForm.id" id="benefit"/>
                          </div>
                          
                      </form>
                  </div>
              </div>
          </div>
          <!-- END Main Content -->
      </div>
  </div>
  <!-- END Page Content -->
  <file-manager-popup />
</main>
<!-- END Main Container -->
</template>

<script>
import { getApi, createApi, updateApi } from '@/api/recruitments'
import _ from 'lodash'
import { mapMutations } from 'vuex'
var slugify = require('slugify')

const defaultForm = {
  id: null,
  position: '',
  slug: '',
  saraly:'',
  qty:'',
  descript: '',
  exp: '',
  benefit : '',
  image: '',
  meta_description: '',
  meta_keywords: '',
  requried: ''
}

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
      panel: [
        false
      ],
      slug: '',
      isAutoSlug: true,
    }
  },
  computed: {
  },
  watch: {
    'currentForm.position': function() {
      if (this.isAutoSlug) {
        this.slug = slugify(_.lowerCase(this.currentForm.position))
      }
    }
  },
  created() {
    if (this.isEdit) {
      const id = this.$route.params && this.$route.params.recruitment
      this.isAutoSlug = false
      this.getData(id)
    } else {
      this.currentForm = Object.assign({}, defaultForm)
    }
  },
  methods: {
    getData(id) {
      getApi(id).then(response => {
        this.currentForm = response
        this.slug = response.slug
      }).catch(err => {
        console.log(err)
      })
    },
    submitFormRequest(data) {
      return new Promise((resolve, reject) => {
        if (this.isEdit) {
          const id = this.$route.params && this.$route.params.recruitment
          updateApi(id, data).then(response => {
            resolve(response)
          }).catch(err => {
            console.log(err)
            reject(err)
          })
        } else {
          createApi(data).then(response => {
            resolve(response)
          }).catch(err => {
            console.log(err)
            reject(err)
          })
        }
      })
    },
    submitForm() {
      // if(this.$refs.currentxForm.validate()) {
          this.loading = true
          this.currentForm.slug = this.slug
          this.submitFormRequest(this.currentForm).then((response) => {
            this.loading = false
            Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu thành công.'})
            if (!this.isEdit) {
              this.$router.replace('/recruitments/edit/' + response.id)
            }
          },
          () => {
            this.loading = false
            Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Không lưu được. Vui lòng lưu lại bằng công cụ khác. Reload và thử lại.'})
          })
      // }
    },

    openBuilder() {
      jQuery('#modal-site-builder').modal('show')
    },
    openFileManager(model) {
      var _this = this
      window.setFileToElement = function(fileurl, filepath) {
        _this.currentForm[model] = filepath
        _this.$store.dispatch('file/closeFileManager')
        jQuery('#modal-site-file').modal('hide')
      }
      if (model == 'video') {
        this.$store.dispatch('file/setType', 'Files')
      }
      this.$store.dispatch('file/openFileManager')
      jQuery('#modal-site-file').modal('show')
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
    margin-top: 0px;
}
</style>
