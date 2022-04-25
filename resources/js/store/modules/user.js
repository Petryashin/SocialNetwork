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
        async getUser({ commit }) {
            let response = await this.$api.get("api/user")
            commit("setUserid", response.data);
            return true
        },
    },
};
export default user