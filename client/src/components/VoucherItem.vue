<template>
  <div class="voucher-item" v-bind:class="{ 'is-complete': voucher.completed }">
    <p>
      <input type="checkbox" v-on:change="markComplete">
      {{ voucher.title }}
      <button @click="$emit('del-voucher', voucher.id)" class="del">Delete</button>
    </p>
  </div>
</template>

<script>
export default {
  name: "VoucherItem",
  props: ["vouchers"],
  methods: {
      markComplete(){
        //   console.log(1);
        this.voucher.completed = !this.voucher.completed;
      }
  }
};
</script>

<style scoped>
.todo-item {
  background: #f4f4f4;
  padding: 10px;
  border-bottom: 1px #ccc dotted;
}
.is-complete {
  text-decoration: line-through;
}
.del {
  background: #ff0000;
  color: #fff;
  border: none;
  padding: 5px 9px;
  border-radius: 50%;
  cursor: pointer;
  float: right;
}
</style>