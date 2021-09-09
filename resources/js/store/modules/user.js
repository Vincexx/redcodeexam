import axios from "axios";
window.Vue = require("vue").default;

const state = {
    users: [],
    dialog: false,
    user: {},
    errors: [],
    edit: false
};

const getters = {
    users: state => state.users,
    dialog: state => state.dialog,
    user: state => state.user,
    errors: state => state.errors,
    edit: state => state.edit
};

const actions = {
    async fetchUsers({ commit }) {
        await axios
            .get("/api/user/list")
            .then(res => {
                commit("setUsers", res.data);
            })
            .catch(err => console.log(err));
    },
    async fetchUser({ commit }, id) {
        await axios
            .get("/api/user/show/" + id)
            .then(res => {
                commit("setUser", res.data);
            })
            .catch(err => console.log(err));
    },
    async deleteUser({ dispatch }, id) {
        await axios
            .delete("/api/user/destroy/" + id)
            .then(res => {
                dispatch("fetchUsers");
            })
            .catch(err => console.log(err));
    },
    async addUser({ dispatch, commit }, data) {
        await axios
            .post("/api/user/store", data)
            .then(response => {
                dispatch("fetchUsers");
                commit("setDialogFalse");
                commit("clearUser");
                commit("clearErrors");
            })
            .catch(error => {
                commit("setErrors", error.response.data.errors);
            });
    },
    async updateUser({ dispatch, commit }, data) {
        await axios
            .put("/api/user/update/" + data.id, data)
            .then(response => {
                dispatch("fetchUsers");
                dispatch("editFalse");
                commit("clearErrors");
            })
            .catch(error => {
                commit("setErrors", error.response.data.errors);
            });
    },
    editTrue({ commit, dispatch }, id) {
        dispatch("fetchUser", id);
        commit("setDialogTrue");
        commit("setEditTrue");
    },
    editFalse({ commit }) {
        commit("setDialogFalse");
        commit("setEditFalse");
        commit("clearUser");
    }
};

const mutations = {
    setUsers(state, payload) {
        return (state.users = payload);
    },
    setUser(state, payload) {
        return (state.user = payload);
    },
    setDialogFalse(state) {
        return (state.dialog = false);
    },
    setDialogTrue(state) {
        return (state.dialog = true);
    },
    clearUser(state) {
        return (state.user = {});
    },
    clearErrors(state) {
        return (state.errors = {});
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
