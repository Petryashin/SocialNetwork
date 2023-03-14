const user = {
    namespaced: true,
    state: {
        users: {},
    },
    mutations: {
        setUsers: (state, users) => (state.users = users),
    },
    getters: {
        getUsers: (state) => state.users,
    },
    actions: {
        async getAvailableUsers({commit, rootGetters}, name) {
            const params = new URLSearchParams([['name', name]]);
            let response = await this.$api.get(`api/chats/users/getAvailable/${rootGetters['user/getUserId']}`, {params})

            commit("setUsers", response.data.users);
            return true
        },
    },
};
export default user
