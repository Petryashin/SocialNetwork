import axios from "axios"

const messages = {
    namespaced: true, 
    state :{
        messages : {},
        // выбранный ID чата
        chat_id: null
    },
    mutations : {
        setChatId : (state, chat_id) => state.chat_id = chat_id,
        // setMessages: (state, data) => state.messages = data,
        setMessages: (state, data) => Vue.set(state.messages, state.chat_id, data),
        // setNewMessage: (state, message) => state.messages.push(message)
        setNewMessage: (state, message) => {
            let item = {
                ...state.messages[state.chat_id],
                message
            };
            Vue.set(state.messages, state.chat_id, item);
        },
    },
    getters : {
        getMessages: (state) => state.messages[state.chat_id]
    }, 
    actions : {
        getMessages ({commit,getters}, chat_id) {
            if (getters.getMessages?.hasOwnProperty(chat_id)) return
            this.$api.get(`/api/dialog/messages/${chat_id}`).then(response => {
                commit("setChatId", chat_id);
                commit("setMessages",response.data)
                console.log("getMessages")
                console.log(response.data)
            })
        },
        sendMessage({commit}, message) {
            commit("setNewMessage",message)
            // console.log("setNewMessage")
            // console.log(message)
            this.$api.put(`/api/dialog/messages/${chat_id}`, message).then(response => {
                console.log(response)})
        }
    }
}
export default messages