import axios from "axios"

const messages = {
    namespaced: true,
    state: {
        messages: {},
        // выбранный ID чата
        chat_id: null
    },
    mutations: {
        setChatId: (state, chat_id) => state.chat_id = chat_id,
        // setMessages: (state, data) => state.messages = data,
        setMessages: (state, data) => Vue.set(state.messages, state.chat_id, data),
        // setNewMessage: (state, message) => state.messages.push(message)
        setNewMessage: (state, message) => {
            let len = Object.keys(state.messages[message.chat_id]).length
            let item = {
                ...state.messages[message.chat_id]
            };
            item[len] = message
            // console.log("item");
            // console.log(item);
            Vue.set(state.messages, message.chat_id, item);
        },
    },
    getters: {
        getMessages: (state) => state.messages[state.chat_id],
        getChatId: (state) => state.chat_id
    },
    actions: {
        getMessages({commit, getters}, chat_id) {
            if (getters.getMessages?.hasOwnProperty(chat_id)) return
            this.$api.get(`/api/dialog/messages/${chat_id}`).then(response => {
                commit("setChatId", chat_id);
                commit("setMessages", response.data.data)
                console.log("getMessages")
                console.log(response.data)
            })
        },
        sendMessage({commit, getters}, message) {
            commit("setNewMessage", message)
            // console.log("setNewMessage")
            // console.log(message)
            let chat_id = getters.getChatId
            this.$api.put(`/api/dialog/messages/${chat_id}`, message).then(response => {
                console.log(response)
            })
        }
    }
}
export default messages
