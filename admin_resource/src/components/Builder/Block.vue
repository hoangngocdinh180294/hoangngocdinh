<template>
<div class="modal" id="modal-site-builder" tabindex="-1" role="dialog" aria-labelledby="modal-site-file" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dựng trang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-1">
                <builder-element v-model="elements" />
                <builder-widget/>
            </div>
        </div>
    </div>
    
</div>
</template>
<script>
    /**
      author: Long Nguyen
      email: long@motbit.com
    */
   import BuilderElement from './Element'
   import BuilderWidget from './Widget'
   export default {
    name: "BuiderBlock",
    components: {
      BuilderElement
    },
    computed: {
      elements: {
        get() {
          return this.$store.state.builder.elements;
        },
        set(value) {
          this.$store.dispatch("builder/updateElements", value);
        }
      }
    },
    methods: {}
  };
</script>
<style rel="stylesheet/scss" lang="scss" scoped>
  .modal {
    z-index: 9999;
  }

  .modal-dialog {
    position: fixed;
    margin: 0;
    width: 100%;
    height: 100%;
    padding: 0;
    max-width: 100% !important;
  }

  .modal-content {
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    border-radius: 0;
  }

  .modal-header {
    position: absolute;
    top: 0;
    right: 0;
    left: 0;
    height: 50px;
    padding: 10px;
  }

  .modal-body {
    position: absolute;
    top: 50px;
    bottom: 60px;
    width: 100%;
    font-weight: 300;
    overflow: hidden;
    padding: 0;
  }
</style>
