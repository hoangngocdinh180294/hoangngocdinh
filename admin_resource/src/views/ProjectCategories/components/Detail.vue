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
                                            <i class="nav-main-link-icon si si-grid"></i>
                                        </span>
                                <li class="breadcrumb-item"><router-link :to="'/projectcategories'">Danh mục dự án</router-link></li>
                                <li class="breadcrumb-item active" aria-current="page" v-if="isEdit">Sửa Danh mục dự án / {{currentForm.name}}</li>
                                <li class="breadcrumb-item active" aria-current="page" v-else>Thêm Danh mục dự án</li>
                                <!-- <li class="breadcrumb-item active" aria-current="page">Library</li> -->
                            </ol>
                        </nav>
                    </div>
                    <div class="block-content">
                        <div class="row justify-content-center py-sm-3 py-md-5">
                            <div class="col-sm-10 col-md-8">
                                <div class="form-group">
                                    <label >Tên Danh mục dự án</label>
                                    <input  v-validate="'required|min:2'" type="text" v-model="currentForm.name" class="form-control form-control-alt"  name="name" placeholder="Nhập tên Danh mục">
                                    <span class="text-danger">{{ errors.first('name') }}</span>
                                </div>
                                <div class="form-group">
                                    <label >Tên dẫn link</label>
                                    <input v-validate="'required'" type="text" v-model="slug" class="form-control form-control-alt"  name="slug" placeholder="Nhập slug">
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
    import { getApi, createApi, updateApi } from '@/api/projectcategories';
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
        name: '',
        slug: ''
    };
    const dictionary = {
        vn: {
            custom:{
                name:{
                    required:'Vui lòng nhập Tên Danh mục dự án',
                    min:"Tên Danh mục dự án ít nhất 2 kí tự",
                    max:"Tên Danh mục dự án quá dài"
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
        data() {
            return {
                currentForm: Object.assign({}, defaultForm),
                valid: true,
                loading: false,
                snackbar: false,
                txtError: '',
                nameRules: [
                    v => v.length > 0 || 'Tên Danh mục dự án không được để trống'
                ],
                slugRules: [
                    v => v.length > 0 || 'Tên dẫn link không được để trống',
                    v => (/^[a-z0-9](-?[a-z0-9])*$/).test(v) || 'Tên dẫn link không chứa khoảng trắng'
                ],
                slug: '',
                isAutoSlug: true
            }
        },
        computed: {
        },
        watch: {
            'currentForm.name': function() {
                if (this.isAutoSlug) {
                    this.slug = slugify(_.lowerCase(this.currentForm.name))
                }
            }
        },
        created() {
            if (this.isEdit) {
                const id = this.$route.params && this.$route.params.projectcategorie;
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
                        const id = this.$route.params && this.$route.params.projectcategorie;
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
                this.currentForm.slug = this.slug;
                this.$validator.validateAll().then((result) => {
                    if (result) {
                        this.loading = true;
                        this.submitFormRequest(this.currentForm).then((response) => {
                            console.log('Categories submitFormRequest->respone id:');
                            console.log(response.id);
                                this.loading = false;
                                Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Lưu Tên Danh mục dự án thành công.'});
                                if (!this.isEdit) {
                                    // this.$router.push({path: '/users'})
                                    this.$router.replace('/projectcategories/edit/' + response.id)
                                }
                            },
                            () => {
                                this.loading = false;
                                Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Tên Danh mục dự án đã có.'})
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
