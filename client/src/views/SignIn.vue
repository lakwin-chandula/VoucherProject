<template>
  <div>
    <div class="container">
      <!-- <b-alert variant="warning" :show="showAlert">Warning Alert</b-alert> -->
      <form class="container" @submit.prevent="submit">
        <div class="form-group">
          <label for="email">Email address</label>
          <input
            type="email"
            class="form-control"
            id="email"
            aria-describedby="emailHelp"
            placeholder="Enter email"
            v-model="user.email"
          />
          <small id="emailHelp" class="form-text text-muted"
            >We'll never share your email with anyone else.</small
          >
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            class="form-control"
            id="password"
            placeholder="Password"
            v-model="user.password"
          />
          <small id="forgotPassword" class="form-text text-muted">
            <a href="#forgotPasswordModal" data-toggle="modal" data-target="#forgotPasswordModal">Forgot password?</a>
          </small>
        </div>
        <button type="submit" class="btn btn-primary">Signin</button>
      </form>
    </div>
    

    <!-- modal -->
    <div id="forgotPasswordModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Forgot your password? Reset it now!</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="email">Email Address</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="enter email"
                />
              </div>
              <div class="form-group">
                <label for="email">Confirm Email Address</label>
                <input
                  type="email"
                  class="form-control"
                  id="confirmEmail"
                  placeholder="confirm email"
                />
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button @click="submit" type="button" class="btn btn-primary">
              Submit
            </button>
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from "vuex";

export default {
  name: "signin",
  components: {
    //
  },
  data() {
    return {
      user: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    ...mapActions({
      signIn: "auth/signIn",
    }),

    clearInputs() {
      this.user.email = "";
      this.user.password = "";
    },

    fireModal() {
      this.$refs["forgotPasswordModal"].show();
    },

    submit() {
      this.signIn(this.user)
        .then(() => {
          this.$router.replace({
            name: "dashboard",
          });
        })
        .catch(() => {
          console.log("Failed");
          alert("Please enter correct email address and password!");
          this.clearInputs();
        });
    },
  },
};
</script>
