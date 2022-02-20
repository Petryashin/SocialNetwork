const chats = {
    namespaced: true,
    state: {
        chats: null,
    },
    mutations: {
        setChats: (state, chats) => (state.chats = chats),
    },
    getters: {
        getChats: (state) => state.chats,
    },
    actions: {
        getChatsFrom({ commit }) {
            this.$api.get("api/chats").then((response) => {
                commit("setChats", response.data);
            });
        },
    },
};
export default chats