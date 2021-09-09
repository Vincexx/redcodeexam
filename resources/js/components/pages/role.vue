<template>
    <div>
        <v-btn class="mx-2" fab dark color="indigo" @click="setDialogTrue">
            <v-icon dark>
                mdi-plus
            </v-icon>
        </v-btn>

        <v-data-table :headers="headers" :items="roles">
            <template v-slot:item.actions="{ item }">
                <v-icon
                    small
                    class="mr-2"
                    color="primary"
                    @click="editTrue(item.id)"
                >
                    mdi-pencil
                </v-icon>

                <v-icon color="red" small @click="deleteRole(item.id)">
                    mdi-delete
                </v-icon>
            </template>
        </v-data-table>

        <addRole />
    </div>
</template>
<script>
import { mapGetters, mapActions, mapMutations } from "vuex";
import addRole from "./modals/addRole.vue";
export default {
    components: {
        addRole
    },
    data() {
        return {
            headers: [
                { text: "NAME", value: "name" },
                { text: "DESCRIPTION", value: "description" },
                { text: "ACTIONS", value: "actions", sortable: false }
            ]
        };
    },
    computed: {
        ...mapGetters("role", ["roles", "dialog"])
    },
    created() {
        this.fetchRoles();
    },
    methods: {
        ...mapActions("role", ["fetchRoles", "deleteRole", "editTrue"]),
        ...mapMutations("role", ["setDialogTrue", "setDialogFalse"])
    }
};
</script>
