<template>
    <main id="main-container">
        <div class="content">
            <div class="block block-rounded block-bordered">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Thông tin thống kê</h3>
                    <button type="button" @click.prevent="loadNew" class="btn btn-outline-info" data-toggle="block-option" data-action="state_toggle"
                            data-action-mode="demo">
                        <i class="si si-refresh"></i>Cập nhập
                    </button>
                </div>
                <!--                <div class="row">-->
                <!--                <div class="col-xl-12">-->
                <!--                    <div class="block-options">-->
                <!--                        <router-link class="nav-main-link" :to="'/statisticals'">-->
                <!--                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">-->
                <!--                                Cập nhập ngay <i class="si si-refresh"></i>-->
                <!--                            </button>-->
                <!--                        </router-link>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <div class="block-content">
                    <div class="row">
                        <div class="col-md-6 col-xl-6">
                            <router-link class="nav-main-link bg-body-dark" :to="'/posts'">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fa fa-2x fa-arrow-alt-circle-up "></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-xwork-darker font-size-h3 font-w500 mb-0">
                                            {{statisticals.count_posts}}
                                        </p>
                                        <p class="text-xwork-dark mb-0">
                                            Bài viết
                                        </p>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                        <div class="col-md-6 col-xl-6">
                            <router-link class="nav-main-link bg-body-dark" :to="'/projects'">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fa fa-2x fa-chart-line text-success"></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-xwork-darker font-size-h3 font-w500 mb-0">
                                            {{statisticals.count_projects}}
                                        </p>
                                        <p class="ttext-xwork-dark mb-0">
                                            Dịch vụ
                                        </p>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                        <div class="col-md-6 col-xl-6">
                            
                            <router-link class="nav-main-link bg-body-dark" :to="'/users'">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="far fa-2x fa-user text-danger"></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-xwork-darker font-size-h3 font-w500 mb-0">
                                            {{statisticals.count_users}}
                                        </p>
                                        <p class="text-xwork-dark mb-0">
                                            Người dùng
                                        </p>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                      <!--  <div class="col-md-6 col-xl-6">
                            <router-link class="nav-main-link bg-body-dark" :to="'/subscribers'">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fa fa-2x fa-boxes text-info"></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-xwork-darker font-size-h3 font-w500 mb-0">
                                            {{statisticals.count_subscribers}}
                                        </p>
                                        <p class="text-xwork-dark mb-0">
                                            Người đăng kí
                                        </p>
                                    </div>
                                </div>
                            </router-link>
                        </div>-->
                        <div class="col-md-6 col-xl-6">
                            <router-link class="nav-main-link bg-body-dark" :to="'/customercontacts'">
                                <div class="block-content block-content-full d-flex align-items-center justify-content-between">
                                    <div>
                                        <i class="fa fa-2x fa-arrow-alt-circle-up text-warning"></i>
                                    </div>
                                    <div class="ml-3 text-right">
                                        <p class="text-xwork-darker font-size-h3 font-w500 mb-0">
                                            {{statisticals.count_contacts}}
                                        </p>
                                        <p class="text-xwork-dark mb-0">
                                            Người liên hệ
                                        </p>
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>
                    <div class="row">
                       <!-- <div class="col-xl-6">
                            <div class="block block-rounded block-bordered">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Người đăng kí mới nhất</h3>
                                </div>
                                <div class="block-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-vcenter">
                                            <thead>
                                            <tr>
                                                <th v-for="(header, hidx) in headersubscribers" :key="hidx"> {{
                                                    header.text }}
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-if="statisticals.new_subscribers"
                                                v-for="(item, index) in statisticals.new_subscribers" :key="index">
                                                <td class="font-w600">
                                                    {{ item.email }}
                                                </td>
                                                <td>{{ item.created_at }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>-->
                        <div class="col-xl-12">
                            <div class="block block-rounded block-bordered">
                                <div class="block-header block-header-default">
                                    <h3 class="block-title">Người liên hệ gần đây</h3>
                                </div>
                                <div class="block-content">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped table-vcenter">
                                            <thead>
                                            <tr>
                                                <th v-for="(header, hidx) in headercontacts" :key="hidx"> {{ header.text
                                                    }}
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr v-if="statisticals.new_contacts"
                                                v-for="(item, index) in statisticals.new_contacts" :key="index">
                                                <td class="font-w600">
                                                    {{ item.email }}
                                                </td>
                                                <td>
                                                    {{ item.full_name }}
                                                </td>
                                                <td>
                                                    {{ item.phone }}
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script>
    import {getApi} from '@/api/statisticals'

    export default {
        name: 'Statisticals',
        data() {
            return {
                headersubscribers: [
                    {
                        sortable: false,
                        text: 'Email',
                        value: 'email'
                    },
                    {
                        sortable: false,
                        text: 'Ngày',
                        value: 'created_at'
                    }
                ],
                headercontacts: [
                    {
                        sortable: false,
                        text: 'Email',
                        value: 'email'
                    },
                    {
                        sortable: false,
                        text: 'Tên',
                        value: 'full_name'
                    },
                    {
                        sortable: false,
                        text: 'Điện thoại',
                        value: 'phone'
                    }
                ],
                listLoading: true,
                statisticals: {}
            }
        },
        created() {
            this.getList()
        },
        methods: {
            getList() {
                this.listLoading = true
                getApi().then(response => {
                    this.statisticals = response
                })
            },
            loadNew(){
                this.listLoading = true
                getApi().then(response => {
                    this.statisticals = response
                })
            }
        }
    }
</script>

<style scoped>
    a.nav-main-link.bg-body-dark {
        margin-bottom: 25px;
    }
</style>
