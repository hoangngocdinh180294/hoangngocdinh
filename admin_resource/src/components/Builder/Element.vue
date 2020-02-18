<template>
<div class="block-content">
  <draggable
    v-bind="dragOptions"
    tag="div"
    class="builder-wrap"
    handle=".handle"
    :list="list"
    :value="value"
    @input="emitter"
  >
    <div v-for="(el, idx) in realValue" :key="el.idx">
        <div>
            <i class="fa fa-align-justify handle"></i><i class="fa fa-times close" @click="removeAt(idx)"></i>
        </div>
        <textarea v-model="el.frontend_render" />
    </div>
  </draggable>
  <div class="form-group">
    <a class="btn btn-sm btn-info" href="javascript:void(0)" @click.prevent="add">Thêm </a>
    <a class="btn btn-sm btn-info" href="javascript:void(0)" @click.prevent="addWidget">Thêm Widget </a>
    </div>
</div>
</template>

<script>
import draggable from "vuedraggable";
export default {
  name: "BuilderElement",
  methods: {
    emitter(value) {
      this.$emit("input", value);
    },
    removeAt(idx) {
      this.list.splice(idx, 1);
    },
    addWidget: function() {
        Dashmix.layout('sidebar_open');
    },
    add: function() {
      this.value.push({
        type: 'row',
        backend_render: '',
        frontend_render: 'hill',
        data: {}
      });
      this.$emit("input", value);
    }
  },
  components: {
    draggable
  },
  computed: {
    dragOptions() {
      return {
        animation: 0,
        group: "description",
        disabled: false,
        ghostClass: "ghost"
      };
    },
    realValue() {
      return this.value ? this.value : this.list;
    }
  },
  props: {
    value: {
      required: false,
      type: Array,
      default: null
    },
    list: {
      required: false,
      type: Array,
      default: null
    }
  }
};
</script>

<style scoped>
.item-container {
  max-width: 20rem;
  margin: 0;
}
.item {
  padding: 1rem;
  border: solid black 1px;
  background-color: #fefefe;
}
.item-sub {
  margin: 0 0 0 1rem;
}
</style>