<template>
  <div>
    <div class="form-group row">
      <label class="col-md-4 col-form-label text-md-right">Advisor</label>

      <div class="col-md-6">
        <select class="form-control" name="advisor_id">
          <option value="">Please select advisor</option>
          <option :value="`${item.id}`" name='advisor_id' v-for="(item, index) in items" :key="index">{{item.firstname}} {{item.lastname}}</option>
        </select>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
export default {
    mounted () {
        this.get_data();
    },
    methods: {
        get_data () {
            axios.get('/api/get_select_advisor').then(response => {
                this.items = response.data;
            });
        }
    },
    data () {
        return {
            items: [],
        }
    }
};
</script>