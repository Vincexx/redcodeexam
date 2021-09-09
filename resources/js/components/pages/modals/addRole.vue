<template>
    <v-dialog v-model="dialog" max-width="400" persistent>
        <v-card>
            <v-card>
                <v-card-title class="headline">
                    <span v-show="!edit">Add Role</span>
                    <span v-show="edit">Update Role</span>
                </v-card-title>

                <v-card-text>
                    <v-text-field
                        label="Name"
                        v-model="role.name"
                          :error="errors.name ? true : false"
                        :error-messages="errors.name"
                    ></v-text-field>
                    <v-text-field
                        label="Description"
                        v-model="role.description"
                    ></v-text-field>
                </v-card-text>

                <v-card-actions>
                    <v-spacer></v-spacer>

                    <v-btn color="green darken-1" text @click="editFalse">
                        Close
                    </v-btn>

                    <v-btn color="green darken-1" text @click="addRole(role)" v-show="!edit">
                        Save
                    </v-btn>
                    <v-btn color="green darken-1" text @click="updateRole(role)" v-show="edit">
                        Update
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-card>
    </v-dialog>
</template>

<script>
import { mapActions, mapGetters, mapMutations } from "vuex";
export default {
    computed: {
        ...mapGetters("role", ["dialog", "role", "errors", "edit"])
    },
    methods: {
        ...mapActions("role", ["addRole", "editFalse", "updateRole"]),
        ...mapMutations("role", ["setDialogTrue", "setDialogFalse"])
    }
};
</script>
