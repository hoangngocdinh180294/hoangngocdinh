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
                          <button type="button" class="btn btn-sm btn-light">
                              <i class="fa fa-plus"></i>
                          </button>
                          Chỉnh sửa slides
                      </div>
                      <div>
                          <!-- <a class="btn btn-sm btn-secondary" href="javascript:void(0)">Preview</a> -->
                          <a class="btn btn-sm btn-info" href="javascript:void(0)" @click.prevent="submitForm">Lưu lại</a>
                      </div>
                  </div>
                  <div class="block-content block-content-full">
                    <div class="row gutters-tiny border-bottom img-fluid-100 animated fadeIn push" v-for="(slide, index) in slides" :key="index" >
                      <div class="col-md-6 project-image">
                        <div class="form-group">
                            <input v-model="slide.title" type="text" class="form-control py-4" name="post-title" placeholder="Tiêu đề ...">
                        </div>
                        <div class="form-group">
                            <textarea v-model="slide.description" class="form-control" name="txt-description" rows="4" placeholder="Nội dung ..."></textarea>
                        </div>
                      </div>
                      <div class="col-md-6 project-image" >
                        <div v-if="slide && slide.image  && slide.image != ''">
                          <img class="img-fluid" :src="slide.image" alt="">
                        </div>
                        <div v-else class="btn-add-image bg-grey"></div>
                        <div class="image-action">
                          <a class="btn btn-sm btn-info add-image mr-1" href="javascript:void(0)" @click.prevent="openFileManager(index)">Chọn hình</a>
                          <a class="btn btn-sm btn-danger remove-image" href="javascript:void(0)" @click.prevent="removeSlide(index)">Xoá Slide</a>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 project-image">
                        <div class="btn-add-image plus-button" @click.prevent="addNewSlide()"> + </div>
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
import { getApi, createApi, updateApi } from '@/api/listslides'
import _ from 'lodash'
import { mapMutations } from 'vuex'

const defaultForm = {
  id: null,
  status: 1,
  slides: []
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
      slugRules: [
        v => v.length > 0 || 'Url không được để trống',
        v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url không chứa khoảng trắng'
      ],
      listStatus: [
        {id: 1, 'name': 'Xuất bản'},
        {id: 0, 'name': 'Bản nháp'}
      ],
      slides: []
    }
  },
  created() {
    if (this.isEdit) {
      const id = this.$route.params && this.$route.params.id
      this.getData(id)
    } else {
      this.currentForm = Object.assign({}, defaultForm)
    }
  },
  methods: {
    addNewSlide() {
      this.slides.push({ image: ''})
    },
    removeSlide(idx) {
      this.slides.splice(idx, 1)
    },
    getData(id) {
      getApi(id).then(response => {
        this.currentForm = response
        this.slides = response.slides
      }).catch(err => {
        console.log(err)
      })
    },
    submitFormRequest(data) {
      return new Promise((resolve, reject) => {
        if (this.isEdit) {
          const id = this.$route.params && this.$route.params.id
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
          this.currentForm.slides = this.slides
          this.submitFormRequest(this.currentForm).then((response) => {
            this.loading = false
            Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu slide thành công.'})
            if (!this.isEdit) {
              this.$router.replace('/slides/edit/' + response.id)
            }
          },
          () => {
            this.loading = false
            Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Không lưu được. Vui lòng lưu lại bài viết bằng công cụ khác. Reload và thử lại.'})
          })
      // }
    },
    openFileManager(index) {
      var _this = this
      window.setFileToElement = function(fileurl, filepath) {
        _this.slides[index].image = filepath
        _this.$store.dispatch('file/closeFileManager')
        jQuery('#modal-site-file').modal('hide')
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
    height: 100px;
    &.plus-button {
      cursor: pointer;
    }
    &.bg-grey {
      background: #ccc;
      height: 176px;
    }
  }

  .project-image {
    position: relative;
    img {
      width: 100%;
      height: 176px;
      object-fit: cover;
    }
    .image-action {
      position: absolute;
      right: 10px;
      top: 10px;
    }
  }
</style>
