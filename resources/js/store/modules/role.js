import axios from "axios";
window.Vue = require("vue").default;

const state = {
    roles: [],
    dialog: false,
    role: {},
    errors: [],
    edit: false
};

const getters = {
    roles: state => state.roles,
    dialog: state => state.dialog,
    role: state => state.role,
    errors: state => state.errors,
    edit: state => state.edit
};

const actions = {
    async fetchRoles({ commit }) {
        await axios
            .get("/api/role/list")
            .then(response => {
                commit("setRoles", response.data);
            })
            .catch(error => console.log(error));
    },
    async fetchRole({ commit }, id) {
        await axios
            .get("/api/role/show/" + id)
            .then(response => {
                commit("setRole", response.data);
            })
            .catch(error => console.log(error));
    },
    async addRole({ commit, dispatch }, data) {
        await axios
            .post("/api/role/store", data)
            .then(response => {
                commit("clearRole");
                commit("clearErrors");
                dispatch("fetchRoles");
                dispatch("editFalse");
            })
            .catch(error => {
                commit("setErrors", error.response.data.errors)
            });
    },
    async updateRole({ commit, dispatch }, data) {
        await axios
            .put("/api/role/update/" + data.id, data)
            .then(response => {
                commit("clearRole");
                commit("clearErrors");
                dispatch("fetchRoles");
                dispatch("editFalse");
            })
            .catch(error => {
                commit("setErrors", error.response.data.errors)
            });
    },
    async deleteRole({ dispatch }, id) {
        await axios
            .delete("/api/role/destroy/" + id)
            .then(response => {
                dispatch("fetchRoles");
            })
            .catch(error => console.log(error));
    },
    editTrue({ commit, dispatch }, id) {
        dispatch("fetchRole", id)
        commit("setDialogTrue");
        commit("setEditTrue");
    },
    editFalse({ commit }) {
        commit("setDialogFalse");
        commit("setEditFalse");
        commit("clearRole");
    }
};

const mutations = {
    setRoles(state, payload) {
        return (state.roles = payload);
    },
    setRole(state, payload) {
        return (state.role = payload);
    },
    setDialogFalse(state) {
        return (state.dialog = false);
    },
    setDialogTrue(state) {
        return (state.dialog = true);
    },
    clearRole(state) {
        return (state.role = {});
    },
    clearErrors(state) {
        return (state.errors = []);
    },
     setErrors(state, payload) {
        return (state.errors = payload);
    },
     setEditFalse(state) {
        return (state.edit = false);
    },
    setEditTrue(state) {
        return (state.edit = true);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
