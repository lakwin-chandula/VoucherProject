<template>
  <div>
    <div v-for="voucher in vouchers" v-bind:key="voucher.id">
      <VoucherItem v-bind:voucher="voucher" v-on:del-voucher="$emit('del-voucher', voucher.id)"/>
    </div>
  </div>
</template>

<script>
import VoucherItem from './VoucherItem';

export default {
  name: "Vouchers", // component name
  components: {
      VoucherItem
  },
  props: ["vouchers"],
};
</script>

<style scoped></style>
