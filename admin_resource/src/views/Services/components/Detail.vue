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
                                            <i class="nav-main-link-icon si si-puzzle"></i>
                                        </span>
                                    <li class="breadcrumb-item"><router-link :to="'/services'">Dự án</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">Sửa Dự án / {{currentForm.title}}</li>
                                    <li class="breadcrumb-item active" aria-current="page" v-else>Tạo Dự án</li>
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                                    </ol>
                                </nav>
                      </div>
                      <div>
                          <!-- <a class="btn btn-sm btn-secondary" href="javascript:void(0)">Preview</a> -->
                          <a class="btn btn-sm btn-info" href="javascript:void(0)" @click.prevent="submitForm">Lưu lại</a>
                      </div>
                  </div>
                  <div class="block-content block-content-full">
                    <div class="form-group">
                        <input v-model="currentForm.title" type="text" class="form-control py-4" id="post-title" name="post-title" placeholder="Tiêu đề ...">
                    </div>
                    <div class="form-group">
                       <input type="text" v-model="link" class="form-control py-4" id="post-link" name="post-link" placeholder="Url ...">
                      <!-- <input type="text" v-model="currentForm.link" class="form-control py-4" id="post-link" name="post-link" placeholder="Link ..."> -->
                    </div>
                    <div class="form-group">
                        <tinymce-tinymce v-model="currentForm.body" :key= "'vue-tinymce-' + currentForm.id"/>
                    </div>
                    <div class="form-group">
                      <div class="service-image" @click="openFileManager('image')">
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
          <!-- END Main Content -->
      </div>
  </div>
  <!-- END Page Content -->
  <file-manager-popup />
</main>
<!-- END Main Container -->
</template>

<script>
import { getApi, createApi, updateApi } from '@/api/services'
import _ from 'lodash'
import { mapMutations } from 'vuex'
var slugify = require('slugify');
const defaultForm = {
  id: null,
  title: '',
  link: '',
  body: '',
  image: '',
  status: 1,
  order: 0

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
      titleRules: [
        v => v.length > 0 || 'Tiêu đề không được để trống'
      ],
      linkRules: [
        v => v.length > 0 || 'Url không được để trống',
        v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url không chứa khoảng trắng'
      ],
      listStatus: [
        {id: 1, 'name': 'Xuất bản'},
        {id: 0, 'name': 'Bản nháp'}
      ],
      isAutoLink: true,
      link: '',
    }
  },
    watch: {
    'currentForm.title': function() {
      if (this.isAutoLink) {
        this.link = slugify(_.lowerCase(this.currentForm.title))
      }
    }
  },
  created() {
    if (this.isEdit) {
      const id = this.$route.params && this.$route.params.service
      this.isAutoLink = false;
      this.getData(id)
    } else {
      this.currentForm = Object.assign({}, defaultForm)
    }
  },
  methods: {
    getData(id) {
      getApi(id).then(response => {
        this.currentForm = response
        this.link = response.link;
      }).catch(err => {
        console.log(err)
      })
    },
    submitFormRequest(data) {
      return new Promise((resolve, reject) => {
        if (this.isEdit) {
          const id = this.$route.params && this.$route.params.service
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
           this.currentForm.link = this.link;
          this.submitFormRequest(this.currentForm).then((response) => {
            this.loading = false
            Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu dữ liệu thành công.'})
            if (!this.isEdit) {
              this.$router.replace('/services/edit/' + response.id)
            }
          },
          () => {
            this.loading = false
            Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Không lưu được. Vui lòng lưu lại bài viết bằng công cụ khác. Reload và thử lại.'})
          })
      // }
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
