<script>
import debounce from 'lodash/debounce';

export default {
    name: 'CoreControls',

    inject: ['state', 'fetch', 'reset', 'buttonAction'],

    computed: {
        meta() {
            return this.state.meta;
        },
    },

    created() {
        this.fetchData = debounce(this.fetchData, this.state.template.debounce);
    },

    methods: {
        fetchData() {
            this.fetch();
        },
    },

    render() {
        return this.$scopedSlots.default({
            reloadEvents: {
                click: this.fetch,
            },
            resetEvents: {
                click: this.reset,
            },
            forceInfoEvents: {
                click: () => {
                    this.meta.forceInfo = true;
                    this.fetch();
                },
            },
            controlBindings: button => ({
                href: button.action === 'href'
                    ? button.path
                    : null,
            }),
            controlEvents: button => ({
                click: () => this.buttonAction(button),
            }),
            searchBindings: {
                value: this.meta.search,
            },
            searchEvents: {
                input: (e) => {
                    this.meta.search = e.target.value;
                    this.fetchData();
                },
            },
            clearEvents: {
                click: () => {
                    this.meta.search = '';
                    this.fetch();
                },
            },
        });
    },
};
</script>
