<template>
  <main id="main-container">
    <div class="content">
      <vue-table id="testimonials" :path= "initTableURL" :i18n="i18n" />
    </div>
  </main>
</template>

<script>
    import { VueTable } from '@enso-ui/tables/bulma';

    export default {
        name: 'TestimonialsList',
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
  div#partners {
    border-radius: 10px;
    border: 2px solid #eee;
  }
  div#partners:hover {
    box-shadow: 0 0 11px rgba(33,33,33,.2);
  }
</style>
