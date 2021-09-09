<template>
    <v-app>
        <navBar :authuser="authuser" />

        <v-content>
            <v-container>
                <v-card width="900px" class="mx-auto mt-3">
                    <h3 class="p-3">Welcome, {{ authuser.name }}</h3>

                    <v-card-title primary-title>
                        <span
                            class="mr-5 title"
                            :class="{ active: showUser }"
                            @click="(showUser = true), (showRole = false)"
                            >Users</span
                        >
                        <span
                            class="title"
                            :class="{ active: showRole }"
                            @click="(showUser = false), (showRole = true)"
                            >Roles</span
                        >
                    </v-card-title>
                    <v-card-text>
                        <div v-show="showUser">
                            <user />
                        </div>

                        <div v-show="showRole">
                            <role />
                        </div>
                    </v-card-text>
                </v-card>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
import navBar from "../navbar.vue";
import user from "./user.vue";
import role from "./role.vue";
export default {
    props: ["authuser"],
    components: {
        navBar,
        user,
        role
    },
    data() {
        return {
            showUser: true,
            showRole: false
        };
    }
};
</script>
<style scoped>
.title {
    cursor: pointer;
}
.active {
    font-weight: bold;
    border-bottom: 1px solid black;
}
</style>
