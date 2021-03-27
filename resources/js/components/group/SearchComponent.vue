<template>
    <div>
        <ejs-autocomplete :dataSource="items" :fields="dataFields" name='add_field'></ejs-autocomplete>
    </div>
</template>

<script>
import axios from 'axios';
import { AutoCompletePlugin } from "@syncfusion/ej2-vue-dropdowns";
Vue.use(AutoCompletePlugin);
export default {
    mounted () {
        this.get_data();
    },
    methods: {
        get_data () {
            axios.get('/api/group/users').then(response => {
                this.items = response.data;
            });
        }
    },
    data () {
        return {
            items: [],
            dataFields: {
                value: "email"
            },
        }
    }
}
</script>

<style scoped>
    @import url("https://cdn.syncfusion.com/ej2/material.css");
</style>
