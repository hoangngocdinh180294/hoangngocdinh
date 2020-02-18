<template>
  <main id="main-container">
    <!-- Page Content -->
    <!-- Main Content -->
    <div class="content content-full">
      <div class="block block-fx-pop">
        <div class="block-content block-content-full d-flex justify-content-between border-bottom">
          <div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li style="margin-top: -4px; margin-right: 5px;">
                  <button type="button" class="btn btn-sm btn-light">
                    <i class="fa fa-plus"></i>
                  </button>
                </li>
                <li class="breadcrumb-item"><router-link :to="'/settings'">Cấu hình</router-link></li>
                <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">Sửa cấu hình / {{currentForm.name}}</li>
                <li class="breadcrumb-item active" aria-current="page" v-else>Tạo cấu hình</li>
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
              <input v-validate="'required|min:2'" v-model="currentForm.name" type="text" class="form-control py-4" id="setting-name" name="name" placeholder="Tên">
              <span class="text-danger">{{ errors.first('name') }}</span>
            </div>
            <div class="form-group">
              <input v-model="currentForm.key" type="text" class="form-control py-4" id="setting-key" name="key" placeholder="Mã nhận dạng">
            </div>
            <div class="form-group">
              <textarea v-model="currentForm.value" class="form-control" rows="4" id="setting-value" name="value" placeholder="Giá trị"></textarea>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- END Main Content -->
    <!-- END Page Content -->
  </main>
  <!-- END Main Container -->
</template>

<script>
  import { getApi, createApi, updateApi } from '@/api/settings'
  import { mapMutations } from 'vuex'
  import Vue from 'vue';
  import VeeValidate from 'vee-validate';
  import { Validator } from 'vee-validate';
  var slugify = require('slugify');

  Vue.use(VeeValidate, {
      useConstraintAttrs: false
  });

  const defaultForm = {
    id: null,
    key: '',
    name: '',
    value: ''
  }

  const dictionary = {
      vn: {
          custom:{
              name:{
                  required:'Vui lòng nhập Tên',
                  min:"Tên ít nhất 2 kí tự",
                  max:"Tên quá dài"
              }
          }
      }
  };
  Validator.localize(dictionary);

  const validator = new Validator({ name: 'required|min' });

  validator.localize('vn');

  export default {
    name: 'Detail',
    props: {
      isEdit: {
        type: Boolean,
        default: false
      }
    },
    components: { },
    data() {
      return {
        currentForm: Object.assign({}, defaultForm),
        valid: true,
        loading: false,
        nameRules: [
          v => v.length > 0 || 'Tiêu đề không được để trống'
        ],
          keyRules: [
          v => v.length > 0 || 'Url không được để trống',
          v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Url không chứa khoảng trắng'
        ],
          key:'',
          isAutoKey: true
      }
    },
    computed: {
    },
    watch: {
        'currentForm.name': function() {
            if (this.isAutoKey) {
                this.key = slugify(_.lowerCase(this.currentForm.name))
            }
        }
    },
    created() {
      if (this.isEdit) {
        const id = this.$route.params && this.$route.params.setting
        this.getData(id)
      } else {
        this.currentForm = Object.assign({}, defaultForm)
      }
    },
    methods: {
      ...mapMutations('app', ['setSnackbar', 'setMessage']),
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
            const id = this.$route.params && this.$route.params.setting
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

          this.currentForm.key = this.key;
          this.$validator.validateAll().then((result) => {
              if (result) {
        this.loading = true
        this.submitFormRequest(this.currentForm).then((response) => {
            this.loading = false
            Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu cấu hình thành công.'})
            if (!this.isEdit) {
              this.$router.replace('/settings/edit/' + response.id)
            }
          },
          () => {
            this.loading = false
            Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Không lưu được. Vui lòng lưu lại cấu hình bằng công cụ khác. Reload và thử lại.'})
          })
        // }
              }
          });
      }
    }
  }
  //  $( ".tox-dialog__body-nav-item:contains('Upload')" ).hide
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
  .tox-tinymce-aux .tox-dialog-wrap .tox-dialog .tox-dialog__content-js .tox-dialog__body .tox-dialog__body-nav[role="tablist"]{
    display: none !important;
  }
</style>
