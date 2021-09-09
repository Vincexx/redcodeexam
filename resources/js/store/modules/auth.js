import axios from "axios";
window.Vue = require("vue").default;

const state = {
    user: {},
    errors: [],
    message: "",
    token: ""
};

const getters = {
    user: state => state.user,
    errors: state => state.errors,
    message: state => state.message,
    token: state => state.token
};

const actions = {
    async login({ state, commit }, data) {
        await axios
            .post("/auth/login", data)
            .then(response => {
                localStorage.setItem("api_token", response.data.token);
                window.location.href = "/dashboard";
            })
            .catch(error => {
                commit("setErrors", error.response.data.errors);
            });
    },
    async logout() {
        await axios.post("/auth/logout").then(response => {
            window.location.href = "/";
        });
    }
};

const mutations = {
    setErrors(state, payload) {
        return (state.errors = payload);
    },
    setMessage(state, payload) {
        return (state.message = payload);
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
