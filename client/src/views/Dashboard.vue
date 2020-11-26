<template>
  <div>
    <AddVoucher v-on:add-voucher="addVoucher" />
    <Vouchers v-bind:vouchers="vouchers" v-on:del-voucher="deleteVoucher" />
  </div>
</template>

<script>
// @ is an alias to /src
import Vouchers from "@/components/Vouchers";
import AddVoucher from "@/components/AddVoucher";
import axios from "axios";

export default {
  name: "dashboard",
  components: {
    Vouchers,
    AddVoucher,
  },
  data() {
    return {
      vouchers: [],
    };
  },

  methods: {
    deleteVoucher(id) {
      axios
        .delete(`auth/vouchers/${id}`)
        .then(
          () =>
            (this.vouchers = this.vouchers.filter(
              (voucher) => voucher.id !== id
            ))
        )
        .catch((err) => console.log(err));
    },

    AddVoucher(newVoucher) {
      const { title, completed } = newVoucher;
      axios
        .post("auth/vouchers", {
          title,
          completed,
        })
        .then((res) => (this.vouchers = [...this.vouchers, res.data]))
        .catch((err) => console.log(err));
    },

    created() {
      axios
        .get("auth/vouchers?_limit=5")
        .then((res) => (this.vouchers = res.vouchers))
        .catch((err) => console.log(err));
    },
  },
};
</script>
<style>
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}
body {
  font-family: Arial, Helvetica, sans-serif;
  line-height: 1.4;
}
.btn {
  display: inline-block;
  border: none;
  background: #555;
  color: #fff;
  padding: 7px 20px;
  cursor: pointer;
}
.btn:hover {
  background: #666;
}
</style>
