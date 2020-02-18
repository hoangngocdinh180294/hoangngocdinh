<template>
  <main id="main-container">
    <div class="content">
      <vue-table id="prices" :path= "initTableURL" :i18n="i18n" />
    </div>
  </main>
</template>


<script>
import { paginateApi,deleteApi } from '@/api/prices'
import Paginate from 'vuejs-paginate'
import { VueTable } from '@enso-ui/tables/bulma';

export default {
  name: 'PricesList',
  components: { VueTable, Paginate },
    data() {
    return {
        loading: false,
         originURL: '',
        initTableURL:'',
      items: [],
      list: null,
      total: 0,
      listLoading: true,
      pageCount: 1,
      currentPage: 1,
      filtersData: {},
      listQuery: {
            page_id: 0,
            page_size: 10,
            embeds: 'author',
            sorts: '-created_at'
        }
    }
  },
  created() {
    // this.getList()
    this.originURL = window.location.origin;
      this.initTableURL = this.originURL+this.$route.fullPath+'/initTable';
  },
  methods: {
    i18n(key) {
        return this.$store.getters.i18n(key);
      },
    getList() {
      this.listLoading = true
        paginateApi(this.listQuery).then(response => {
            this.items = response.result
            this.pageCount = response.meta.page_count
            this.currentPage = response.meta.page_id + 1
            this.listLoading = false
        })
    },
      handleSizeChange(val) {
          this.listQuery.page_size = val
          this.getList()
      },
      handleCurrentChange(val) {
          this.listQuery.page_id = val - 1
          this.getList()
      },
    getStatus(value) {
      switch(value) {
        case 1:
          return 'Xuất bản'
        default:
          return 'Bản nháp'
      }
    },
      deleteItem(id) {

          var r = confirm("Bạn có thực sự muốn xóa trang này này?");
          if (r == true) {
              deleteApi(id).then(response => {
                  Dashmix.helpers('notify', {type: 'success', icon: 'fa fa-success mr-1', message: 'Xóa thành công.'})
                  this.getList()
              }, err => {
                  Dashmix.helpers('notify', {type: 'danger', icon: 'fa fa-times mr-1', message: 'Không xóa được. Vui lòng thử lại.'})
              })
          }

      }
  }
}
</script>

<style scoped>
div#prices {
    border-radius: 10px;
    border: 2px solid #eee;
}
div#prices:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2); 
}
</style>
