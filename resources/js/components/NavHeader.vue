<script>
export default {
    data() {
        return {
            showMenu: false,
            showSubMenu: false,
            showSearch: false,
            searchText: '',
            isComparing: false,
        };
    },

    created() {
        window.events.$on('compareMode', booleanValue => {
            if (booleanValue) {
                this.showSearch = false;
                this.isComparing = true;
                this.searchText = '';
            } else {
                this.isComparing = false;
            }
        });
    },

    watch: {
        searchText(newValue, oldValue) {
            window.events.$emit('searchTeam', newValue);
        }
    },

    methods: {
        sort() {
            window.events.$emit('sortData');
        }
    }
}
</script>