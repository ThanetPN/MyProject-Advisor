<template>
  <div>
    <div class="form-group row">
      <label class="col-md-4 col-form-label text-md-right">Name git</label>

      <div class="col-md-6 mb-3">
        <input
          type="text"
          class="form-control"
          v-model="name_git"
        />
      </div>

      <label class="col-md-4 col-form-label text-md-right">Link git</label>

      <div class="col-md-6">
        <input
          type="text"
          class="form-control"
          v-model="link_git"
        />
      </div>

      <button class='col-md-1 btn btn-info' type='button' @click="add_data()">Add</button>

    </div>

    <div class='form-group row' v-for="(item, index) in items" :key="index">
      <label class="col-md-4 col-form-label text-md-right">Name git</label>
      <div class='col-md-6 mb-3'>
        <input class='form-control' name="name[]" type="text" :value="`${item.name_git}`" readonly>
      </div>
      
      <label class="col-md-4 col-form-label text-md-right">Link git</label>
      <div class='col-md-6'>
        <input class='form-control' name="link[]" type="text" :value="`${item.link_git}`" readonly>
      </div>
      <button class='col-md-1 btn btn-danger' @click="delete_data(index)">Del</button>
    </div>

  </div>
</template>

<script>
export default {
  methods: {
    add_data () {
      this.items.push({
        name_git: this.name_git,
        link_git: this.link_git
      });
      this.name_git = '';
      this.link_git = '';
    },
    delete_data (index) {
      this.items.splice(index, 1);
    }
  },
  data () {
    return {
      name_git: '',
      link_git: '',
      items: [],
    }
  }
};
</script>