<template>
  <detail :is-edit="false"/>
</template>

<script>
import Detail from './components/Detail'

export default {
  name: 'EmployeesCreate',
  components: { Detail }
}
</script>
