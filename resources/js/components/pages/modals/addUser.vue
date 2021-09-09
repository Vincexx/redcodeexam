<template>
    <v-dialog v-model="dialog" max-width="400" persistent>
        <v-card>
            <v-card>
                <v-card-title class="headline">
                    <span v-show="!edit">Add User</span>
                    <span v-show="edit">Update User</span>
                </v-card-title>

                <v-card-text>
                    <v-text-field
                        label="Name"
                        v-model="user.name"
                        :error="errors.name ? true : false"
                        :error-messages="errors.name"
                    ></v-text-field>
                    <v-text-field
                        label="Email"
                        v-model="user.email"
                        :error="errors.email ? true : false"
                        :error-messages="errors.email"
                    ></v-text-field>

                    <v-select
                        :items="roles"
                        item-text="name"
                        item-value="id"
                        label="Select Role"
                        v-model="user.role_id"
                        :error="errors.role_id ? true : false"
                        :error-messages="errors.role_id"
                    ></v-select>

                    <v-text-field
                        v-show="!edit"
                        label="Password"
                        type="password"
                        v-model="user.password"
                        :error="errors.password ? true : false"
                        :error-messages="errors.password"
                    ></v-text-field>
                    <v-text-field
                     v-show="!edit"
                        label="Confirm Password"
                        type="password"
                        v-model="user.password_confirmation"
                         :error="errors.password ? true : false"
                        :error-messages="errors.password"
                    ></v-text-field>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn color="green darken-1" text @click="editFalse">
                        Close
                    </v-btn>

                    <v-btn
                        color="green darken-1"
                        text
                        :loading="loading"
                        @click="addUser(user)"
                        v-show="!edit"
                    >
                        Save
                    </v-btn>

                     <v-btn
                        color="green darken-1"
                        text
                        :loading="loading"
                        v-show="edit"
                        @click="updateUser(user)"
                    >
                        Update
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-card>
    </v-dialog>
</template>
<script>
import { mapGetters, mapMutations, mapActions } from "vuex";
export default {
    computed: {
        ...mapGetters("user", ["dialog", "user", "errors", "edit"]),
         ...mapGetters("role", ["roles"])
    },
    data() {
        return {
            loading: false
        };
    },
    created() {
          this.fetchRoles()
    },
    methods: {
        ...mapActions("user", ["addUser", "editFalse", "updateUser"]),
        ...mapMutations("user", ["setDialogFalse", "setDialogTrue"]),
        
        ...mapActions("role", ["fetchRoles"]),
    }
};
</script>
