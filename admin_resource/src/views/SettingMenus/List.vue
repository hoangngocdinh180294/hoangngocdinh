<template>
  <main id="main-container">
    <div class="content">
      <vue-table id="settingmenus" :path= "initTableURL" :i18n="i18n" >
      </vue-table>
    </div>
  </main>
</template>

<script>
  import { VueTable } from '@enso-ui/tables/bulma';
  import { mapState } from 'vuex';
  import { getApi } from '@/api/settingmenus';

  export default {
    name: 'SettingMeusList',
    components: { VueTable },
    data() {
      return {
        originURL: '',
        initTableURL:'',
      }
    },
    computed: {
      // ...mapState(['locale']),
    },
    created() {
      this.originURL = window.location.origin;
      this.initTableURL = this.originURL+this.$route.fullPath+'/initTable';
    },
    methods: {
      i18n(key) {
        return this.$i18n.translate(key);
      }
    }
  }
</script>

<style scoped>

</style>
