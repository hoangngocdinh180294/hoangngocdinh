<template>
    <router-view />
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
