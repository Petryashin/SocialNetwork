const chats = {
    namespaced: true,
    state: {
        chats: {},
    },
    mutations: {
        setChats: (state, chats) => (state.chats = chats),
        setNewChat: (state, chat) => {
            state.chats.push(chat)
        }
    },
    getters: {
        getChats: (state) => state.chats,
    },
    actions: {
        getChatsFrom({commit}) {
            this.$api.get("api/chats").then((response) => {
                commit("setChats", response.data);
            });
        },
        createNewChatWithUser({commit, rootGetters}, proposeUser) {
            this.$api.post(`api/chats/privates/create/${rootGetters['user/getUserId']}`,
                {user_id: proposeUser.id})
                .then((response) => {
                    if (!response.data.success) {
                        alert(response.data.message)
                        return
                    }

                    commit("setNewChat", response.data.newChat)
                });
        }
    },
};
export default chats
