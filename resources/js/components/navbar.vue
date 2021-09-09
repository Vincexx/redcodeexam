<template>
    <v-app-bar app dark color="blue">
        <v-toolbar-title>REDCORE EXAM</v-toolbar-title>
        <v-spacer></v-spacer>
        <v-btn outlined @click="login" v-if="!authuser">Login</v-btn>
        <v-btn outlined @click="logout" v-if="authuser">Logout</v-btn>
    </v-app-bar>
</template>

<script>
import { mapActions } from "vuex";
export default {
    props: ["authuser"],
    methods: {
        ...mapActions("auth", ["logout"]),
        login() {
            window.location.href = "/login";
        }
    }
};
</script>
