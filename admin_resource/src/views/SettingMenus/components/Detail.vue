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
                                    <li class="breadcrumb-item"><router-link :to="'/settingmenus'">Ẩn hiện giao diện</router-link></li>
                                    <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">Sửa giao diện</li>
                                    
                                    <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                                    </ol>
                                </nav>
          </div>
          <div class="block-content">
              <div class="row justify-content-center py-sm-3 py-md-5">
                  <div class="col-sm-10 col-md-8">
                  <div class="row">
                      <div class="col-md-6">
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.gioi_thieu" type="checkbox" class="custom-control-input" id="customSwitches1">
                        <label class="custom-control-label" for="customSwitches1" v-for="(gioi_thieu, oidx) in listGioithieu" :value="gioi_thieu.id" :key="oidx">{{ gioi_thieu.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.dich_vu" type="checkbox" class="custom-control-input" id="customSwitches2">
                        <label class="custom-control-label" for="customSwitches2" v-for="(dich_vu, oidx) in listDichvu" :value="dich_vu.id" :key="oidx">{{ dich_vu.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.du_an" type="checkbox" class="custom-control-input" id="customSwitches3">
                        <label class="custom-control-label" for="customSwitches3" v-for="(du_an, oidx) in listDuan" :value="du_an.id" :key="oidx">{{ du_an.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.tin_tuc" type="checkbox" class="custom-control-input" id="customSwitches4">
                        <label class="custom-control-label" for="customSwitches4" v-for="(tin_tuc, oidx) in listTintuc" :value="tin_tuc.id" :key="oidx">{{ tin_tuc.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.khach_hang" type="checkbox" class="custom-control-input" id="customSwitches5">
                        <label class="custom-control-label" for="customSwitches5" v-for="(khach_hang, oidx) in listKhachhang" :value="khach_hang.id" :key="oidx">{{ khach_hang.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.bao_gia" type="checkbox" class="custom-control-input" id="customSwitches6">
                        <label class="custom-control-label" for="customSwitches6" v-for="(bao_gia, oidx) in listBanggia" :value="bao_gia.id" :key="oidx">{{ bao_gia.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.tuyen_dung" type="checkbox" class="custom-control-input" id="customSwitches7">
                        <label class="custom-control-label" for="customSwitches7" v-for="(tuyen_dung, oidx) in listTuyendung" :value="tuyen_dung.id" :key="oidx">{{ tuyen_dung.name}}</label>
                      </div>
                      </div>
                      <div class="col-md-6">
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.lien_he" type="checkbox" class="custom-control-input" id="customSwitches8">
                        <label class="custom-control-label" for="customSwitches8" v-for="(lien_he, oidx) in listLienhe" :value="lien_he.id" :key="oidx">{{ lien_he.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.lanh_dao" type="checkbox" class="custom-control-input" id="customSwitches9">
                        <label class="custom-control-label" for="customSwitches9" v-for="(lanh_dao, oidx) in listLanhdao" :value="lanh_dao.id" :key="oidx">{{ lanh_dao.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.header" type="checkbox" class="custom-control-input" id="customSwitches10">
                        <label class="custom-control-label" for="customSwitches10" v-for="(header, oidx) in listHeader" :value="header.id" :key="oidx">{{ header.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.slide" type="checkbox" class="custom-control-input" id="customSwitches11">
                        <label class="custom-control-label" for="customSwitches11" v-for="(slide, oidx) in listSlide" :value="slide.id" :key="oidx">{{ slide.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.slogan" type="checkbox" class="custom-control-input" id="customSwitches12">
                        <label class="custom-control-label" for="customSwitches12" v-for="(slogan, oidx) in listSlogan" :value="slogan.id" :key="oidx">{{ slogan.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.instagram" type="checkbox" class="custom-control-input" id="customSwitches13">
                        <label class="custom-control-label" for="customSwitches13" v-for="(instagram, oidx) in listInstagram" :value="instagram.id" :key="oidx">{{ instagram.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.tai_sao" type="checkbox" class="custom-control-input" id="customSwitches14">
                        <label class="custom-control-label" for="customSwitches14" v-for="(tai_sao, oidx) in listTaisao" :value="tai_sao.id" :key="oidx">{{ tai_sao.name}}</label>
                      </div>
                      <div class="custom-control custom-switch">
                        <input v-model="currentForm.footer" type="checkbox" class="custom-control-input" id="customSwitches15">
                        <label class="custom-control-label" for="customSwitches15" v-for="(footer, oidx) in listFooter" :value="footer.id" :key="oidx">{{ footer.name}}</label>
                      </div>
                      </div>
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
import { getApi, updateApi } from '@/api/settingmenus';
import Vue from 'vue';
import VeeValidate from 'vee-validate';
import { Validator } from 'vee-validate';
import _ from 'lodash'
import { mapMutations } from 'vuex'


Vue.use(VeeValidate, {
    useConstraintAttrs: false
});

const defaultForm = {
  id : null,
  gioi_thieu: 0,
  dich_vu: 0,
  du_an: 0,
  tin_tuc: 0,
  khach_hang: 0,
  lien_he: 0,
  lanh_dao: 0,
  bao_gia: 0,
  tuyen_dung: 0,
  header: 0,
  slide: 0,
  instagram: 0,
  tai_sao: 0,
  footer: 0,
  slogan: 0,
};
const dictionary = {
    vn: {
       custom:{
         
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
      listGioithieu: [
        {id: 1, 'name': 'Giới thiệu'}
      ],
      listDichvu: [
        {id: 1, 'name': 'Dịch vụ'}
      ],
      listDuan: [
        {id: 1, 'name': 'Dự án'}
      ],
      listTintuc: [
        {id: 1, 'name': 'Tin tức'}
      ],
      listKhachhang: [
        {id: 1, 'name': 'Khách hàng'}
      ],
      listBanggia: [
        {id: 1, 'name': 'Bảng giá'}
      ],
      listTuyendung: [
        {id: 1, 'name': 'Tuyển dụng'}
      ],
      listLienhe: [
        {id: 1, 'name': 'Liên hệ'}
      ],
      listLanhdao: [
        {id: 1, 'name': 'Lãnh đạo'}
      ],
      listHeader: [
        {id: 1, 'name': 'Đầu trang'}
      ],
      listSlogan: [
        {id: 1, 'name': 'Slogan'}
      ],
      listSlide: [
        {id: 1, 'name': 'Slide'}
      ],
      listFooter: [
        {id: 1, 'name': 'Chân trang'}
      ],
      listInstagram: [
        {id: 1, 'name': 'Instagram'}
      ],
      listTaisao: [
        {id: 1, 'name': 'Tại sao chọn chúng tôi'}
      ]
    }
  },
  computed: {
  },
  created() {
    if (this.isEdit) {
      const id = this.$route.params && this.$route.params.settingmenu;
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
          const id = this.$route.params && this.$route.params.settingmenu;
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
                // this.listBanggia = this.currentForm.bao_gia;
                console.log(this.listBanggia);
      
      
                this.submitFormRequest(this.currentForm).then((response) => {
                    this.loading = false;
                    this.listGioithieu.name = 'Giới thiệu';
                    this.listDichvu.name = 'Dịch vụ';
                    this.listDuan.name = 'Dự án';
                    this.listTintuc.name = 'Tin tức';
                    this.listKhachhang.name = 'Khách hàng';
                    this.listBanggia.name = 'Bảng giá';
                    this.listTuyendung.name = 'Tuyển dụng';
                    this.listLienhe.name = 'Liên hệ';
                    this.listLanhdao.name = 'Lãnh đạo';
                    this.listHeader.name = 'Đầu trang';
                    this.listSlogan.name = 'Slogan';
                    this.listSlide.name = 'Slide';
                    this.listFooter.name = 'Chân trang';
                    this.listInstagram.name = 'Instagram';
                    this.listTaisao.name = 'Tại sao chọn chúng tôi';
                    Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu thành công.'});
                    if (!this.isEdit) {
                        // this.$router.push({path: '/users'})
                        this.$router.replace('/settingmenus/edit/' + response.id)
                    }
                },
                // ).catch((error) => {
                //     this.loading = false
                //     this.txtError = 'Xảy ra lỗi, vui lòng lưu lại các thay đổi của bạn và reload page'
                //     this.snackbar = true
                // })
                    () => {
                        this.loading = false;
                        Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Lỗi! Vui lòng thử lại!'})
                    })
            }
        });
    }
  }
}
</script>

<style rel="stylesheet/scss" lang="scss" scoped>

</style>
