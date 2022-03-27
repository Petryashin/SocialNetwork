const user = {
    namespaced: true,
    state: {
        id: null,
    },
    mutations: {
        setUserid: (state, id) => (state.id = id),
    },
    getters: {
        getUserId: (state) => state.id,
    },
    actions: {
        getUser({ commit }) {
            this.$api.get("api/user").then((response) => {
                commit("setUserid", response.data);
            });
        },
    },
};
export default user