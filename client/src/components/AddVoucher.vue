<template>
  <div>
    <form @submit.prevent="addVoucher">
      <input type="text" name="title" placeholder="Add Voucher.." v-model="title"/>
      <input class="btn" type="submit" value="Submit" />
    </form>
  </div>
</template>

<script>
// import uuid from 'uuid';

export default {
  name: "AddVoucher",
  data() {
    return {
        title: ''
    }
  },
  methods:{
      addVoucher(){
        //   console.log(1);
        // e.preventDefault();
        
        const newVoucher = {
            // id: uuid,
            title: this.title,
            completed: false
        }
        // send up to parent
        this.$emit('add-voucher', newVoucher);

        this.title = '';
      }
  }
};
</script>

<style scoped>
form {
  display: flex;
}
input[type="text"] {
  flex: 10;
  padding: 5px;
}
submit[type="submit"] {
  flex: 2;
}
</style>
