<template>
    <main id="main-container">
      <div class="content">
        <vue-table id="posts" :path= "initTableURL" :i18n="i18n" />
      </div>
    </main>
</template>

<script>
    import { VueTable } from '@enso-ui/tables/bulma';

    export default {
        name: 'PostsList',
        components: { VueTable },
        data() {
            return {
              originURL: '',
              initTableURL:'',
            }
        },
        created() {
          this.originURL = window.location.origin;
          this.initTableURL = this.originURL+this.$route.fullPath+'/initTable';
        },
        methods: {
          i18n(key) {
            return this.$store.getters.i18n(key);
          }
        }
    }
</script>

<style scoped>
div#posts {
    border-radius: 10px;
    border: 2px solid #eee;
}
div#posts:hover {
  box-shadow: 0 0 11px rgba(33,33,33,.2); 
}
</style>
