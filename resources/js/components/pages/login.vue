<template>
    <div>
        <v-app>
            <v-main>
                <v-content>
                    <navBar />
                    <v-container>
                        <v-card width="500px" class="mt-9 mx-auto">
                            <v-card-title>Login</v-card-title>

                            <v-alert type="error" :value="message ? true : false">
                                {{ message }}
                            </v-alert>

                            <v-card-text>
                                <v-text-field
                                    label="Email Address"
                                    prepend-icon="mdi-account"
                                    v-model="user.email"
                                    :error="errors.email ? true : false"
                                    :error-messages="errors.email"
                                ></v-text-field>
                                <v-text-field
                                    label="Password"
                                    prepend-icon="mdi-lock"
                                    type="password"
                                    v-model="user.password"
                                    :error="errors.password ? true : false"
                                    :error-messages="errors.password"
                                ></v-text-field>
                                <v-btn color="success" @click="login(user)">Login</v-btn>
                            </v-card-text>

                        </v-card>
                    </v-container>
                </v-content>
            </v-main>
        </v-app>
    </div>
</template>

<script>
import navBar from "../navbar.vue";
import { mapGetters, mapActions } from "vuex";
export default {
    components: {
        navBar
    },
    computed: {
        ...mapGetters('auth', ['user', 'errors', 'message'])
    },
    methods: {
        ...mapActions('auth', ['login'])
    }
};
</script>
