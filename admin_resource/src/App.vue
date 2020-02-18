<template>
    <div id="page-container" :class="[logged? 'sidebar-o sidebar-mini side-scroll page-header-fixed page-header-dark':'']">
      <template v-if="logged">
        <core-nav />
        <core-header />
        <core-view />
        <core-footer />
        </template>
      <template v-else>
        <router-view />
      </template>
      </div>
</template>

<script>
export default {
  name: 'App',
  data () {
    return {
    }
  },
  computed: {
    logged() {
      const whiteList = ['/login', '/']
      return (whiteList.indexOf(this.$route.path) !== -1) ? false : true
    }
  }
}
</script>
<style scope>
svg.svg-inline--fa.fa-angle-down.fa-w-10 {
    margin-left: -53px;
}
li {
  list-style: none;
}
a.pagination-link.is-current {
    color: #fff;
}
ul.pagination-list {
    margin-top: 0px;
}
.dropdown-menu.dropdown-selector {
    box-shadow: none;
    background-color: transparent;
    padding-left: 0px;
}
.options.no-scrollbars {
    margin: 0px 10px;
}
</style>