<template>
    <div>
        <v-btn class="mx-2" fab dark color="indigo" @click="setDialogTrue">
            <v-icon dark>
                mdi-plus
            </v-icon>
        </v-btn>

        <v-data-table :headers="headers" :items="users">
            <template v-slot:item.actions="{ item }">
                <v-icon
                    small
                    class="mr-2"
                    color="primary"
                    @click="editTrue(item.id)"
                >
                    mdi-pencil
                </v-icon>

                <v-icon color="red" small @click="deleteUser(item.id)">
                    mdi-delete
                </v-icon>
            </template>
        </v-data-table>

        <addUser />
    </div>
</template>
<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
import addUser from "./modals/addUser.vue";
export default {
    components: {
        addUser
    },
    data() {
        return {
            search: "",
            items: [],
            headers: [
                { text: "NAME", value: "name" },
                { text: "EMAIL", value: "email" },
                { text: "ROLE", value: "role.name" },
                { text: "ACTIONS", value: "actions", sortable: false }
            ]
        };
    },
    computed: {
        ...mapGetters("user", ["users", "dialog"])
       
    },
    created() {
        this.fetchUsers();
    },
    methods: {
        ...mapActions("user", ["fetchUsers", "deleteUser", "editTrue", "fetchUser"]),
        ...mapMutations("user", ["setDialogFalse", "setDialogTrue"])

        
    }
};
</script>
