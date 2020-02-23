<script>
export default {
    data() {
        return {
            showMenu: false,
            showSubMenu: false,
            showSearch: false,
            searchText: '',
            isComparing: false,
            showSortSubMenu: false,
            sortDirection: 'desc'
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
        sortAsc() {
            window.events.$emit('sortData', 'asc');
            this.sortDirection = 'asc';
        },
        sortDesc() {
            window.events.$emit('sortData', 'desc');
            this.sortDirection = 'desc';
        }
    }
}
</script>