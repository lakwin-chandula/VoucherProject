<template>
  <nav
    class="navbar navbar-expand-sm navbar-dark bg-dark justify-content-between"
  >
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active mr-5">
        <router-link
          :to="{
            name: 'home',
          }"
        >
          Home
        </router-link>
      </li>
      <template v-if="authenticated">
        <li class="nav-item mr-5">
          <router-link
            :to="{
              name: 'dashboard',
            }"
          >
            Dashboard
          </router-link>
        </li>
      </template>
    </ul>

    <form class="form-inline">
      <template v-if="!authenticated">
        <router-link
          :to="{
            name: 'signin',
          }"
        >
          Sign-In
        </router-link>
      </template>
      <template v-else>
        <li class="nav-item mr-5" style="color:white">
          <router-link
            :to="{
              name: 'profile',
            }"
          >
            {{ user.name }}
          </router-link>
        </li>
        <a href="#" @click.prevent="signOut">
          Signout
        </a>
      </template>
    </form>
  </nav>
</template>

<script>
import { mapGetters, mapActions } from "vuex";

export default {
  computed: {
    ...mapGetters({
      authenticated: "auth/authenticated",
      user: "auth/user",
    }),
  },
  methods: {
    ...mapActions({
      signOutAction: "auth/signOut",
    }),

    signOut() {
      this.signOutAction().then(() => {
        this.$router.replace({
          name: "home",
        });
      });
    },
  },
};
</script>
